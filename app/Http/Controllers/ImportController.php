<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Inventory;
use App\Models\Unit;
use App\Models\User;

class ImportController extends Controller
{
    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|mimes:xlsx,xls'
        ]);

        $path = $request->file('file')->getRealPath();
        $spreadsheet = IOFactory::load($path);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = [];

        foreach ($worksheet->getRowIterator(2) as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $cells = [];
            foreach ($cellIterator as $cell) {
                $cells[] = $cell->getValue();
            }
            $rows[] = $cells;
        }

        $duplicates = [];
        foreach ($rows as $row) {
            $unit = Unit::where('name', $row[1])->first();
            $equipment = Equipment::where('name', $row[3])->first();
            $user = User::where('name', $row[6])->first();

            $existingInventory = Inventory::where('name', $row[2])
                ->where('serial_number', $row[4])
                ->first();

            if ($existingInventory) {
                $duplicates[] = $existingInventory;
            } else {
                Inventory::create([
                    'quantity' => $row[0],
                    'unit_id' => $unit ? $unit->id : null,
                    'name' => $row[2],
                    'equipment_id' => $equipment ? $equipment->id : null,
                    'serial_number' => $row[4],
                    'remark' => $row[5],
                    'created_by' => $user ? $user->id : null,
                ]);
            }
        }

        if (count($duplicates) > 0) {
            return back()->with('warning', 'Some records were not imported because duplicates were found.');
        }

        return back()->with('success', 'Data imported successfully.');
    }
}
