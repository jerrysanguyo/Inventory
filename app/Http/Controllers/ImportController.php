<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Inventory;
use App\Models\Unit;
use App\Models\User;
use App\Models\Deployment;
use App\Models\Department;

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
            if ($row[0] === null){
                return back()->with('success', 'Data imported successfully.');
            } else {
                $unit = Unit::where('name', $row[1])->first();
                $equipment = Equipment::where('name', $row[3])->first();
                $user = User::where('name', $row[6])->first();
                $department = $row[6] !== 'N/A' ? Department::where('name', $row[6])->first() : null;
                $issuedBy = $row[8] !== 'N/A' ? User::where('name', $row[8])->first() : null;
                $deployedBy = $row[10] !== 'N/A' ? User::where('name', $row[10])->first() : null;
                $returnedByReceived = $row[15] !== 'N/A' ? User::where('name', $row[14])->first() : null;
        
                $existingInventory = Inventory::where('name', $row[2])
                    ->where('serial_number', $row[4])
                    ->first();
        
                if ($existingInventory) {
                    $duplicates[] = $existingInventory;
                    if ($row[6] != 'N/A' && $row[13] != 'N/A') {
                        $deployment = Deployment::create([
                            'inventory_id' => $existingInventory->id,
                            'department_id' => $department ? $department->id : null,
                            'assigned_to' => $row[7],
                            'issued_by' => $issuedBy ? $issuedBy->id : null,
                            'deploy_by' => $deployedBy ? $deployedBy->id : null,
                            'deploy_date' => $row[11],
                            'status' => $row[12],
                            'return_by' => $row[13],
                            'return_date' => $row[14],
                            'received_by_return' => $returnedByReceived ? $returnedByReceived->id : null,
                            'created_by' => auth()->id(),
                            'updated_by' => auth()->id(),
                        ]);
                    } elseif ($row[6] != 'N/A') {
                        $deployment = Deployment::create([
                            'inventory_id' => $existingInventory->id,
                            'department_id' => $department ? $department->id : null,
                            'assigned_to' => $row[7],
                            'issued_by' => $issuedBy ? $issuedBy->id : null,
                            'received_by' => $row[9],
                            'deploy_by' => $deployedBy ? $deployedBy->id : null,
                            'deploy_date' => $row[11],
                            'status' => $row[12],
                            'created_by' => auth()->id(),
                            'updated_by' => auth()->id(),
                        ]);
                    }
                } else {
                    $inventory = Inventory::create([
                        'quantity' => $row[0],
                        'unit_id' => $unit ? $unit->id : null,
                        'name' => $row[2],
                        'equipment_id' => $equipment ? $equipment->id : null,
                        'serial_number' => $row[4],
                        'remark' => $row[5],
                        'created_by' => auth()->id(),
                    ]);
        
                    if ($inventory) {
                        if ($row[6] != 'N/A' && $row[13] != 'N/A') {
                            $deployment = Deployment::create([
                                'inventory_id' => $inventory->id,
                                'department_id' => $department ? $department->id : null,
                                'assigned_to' => $row[7],
                                'issued_by' => $issuedBy ? $issuedBy->id : null,
                                'deploy_by' => $deployedBy ? $deployedBy->id : null,
                                'deploy_date' => $row[11],
                                'status' => $row[12],
                                'return_by' => $row[13],
                                'return_date' => $row[14],
                                'received_by_return' => $returnedByReceived ? $returnedByReceived->id : null,
                                'created_by' => auth()->id(),
                                'updated_by' => auth()->id(),
                            ]);
                        } elseif ($row[6] != 'N/A') {
                            $deployment = Deployment::create([
                                'inventory_id' => $inventory->id,
                                'department_id' => $department ? $department->id : null,
                                'assigned_to' => $row[7],
                                'issued_by' => $issuedBy ? $issuedBy->id : null,
                                'received_by' => $row[9],
                                'deploy_by' => $deployedBy ? $deployedBy->id : null,
                                'deploy_date' => $row[11],
                                'status' => $row[12],
                                'created_by' => auth()->id(),
                                'updated_by' => auth()->id(),
                            ]);
                        }
                    }
                }
            }
        }
    
        if (count($duplicates) > 0) {
            return back()->with('warning', 'Some records were not imported because duplicates were found.');
        }
        return back()->with('success', 'Data imported successfully.');
    }
}
