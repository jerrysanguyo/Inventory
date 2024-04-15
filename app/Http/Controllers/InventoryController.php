<?php

namespace App\Http\Controllers;

use App\DataTables\InventoryDataTable;
use App\DataTables\IHPerItemDataTable;
use App\Models\Inventory;
use App\Models\Department;
use App\Models\Equipment;
use App\Models\Unit;
use App\Models\User;
use App\Models\Deployment;
use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(InventoryDataTable $DataTable)
    {
        $listOfInventory = Inventory::getAllInventory();
        $listOfInventory = Inventory::with('latestDeployment')->get();
        $listOfDepartment = Department::getAllDepartment();
        return $DataTable->render('Inventory.index', compact(
            'listOfInventory',
            'listOfDepartment',
            'DataTable',
        ));
    }
    
    public function create()
    {
        $listOfEquipment = Equipment::getAllEquipment();
        $listOfUnit = Unit::getAllUnit();
        $listOfUser = User::getAllUser();
        return view('Inventory.create', compact(
            'listOfEquipment',
            'listOfUnit',
            'listOfUser'
        ));
    }
    
    public function store(StoreInventoryRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = auth()->id();
        $validated['updated_by'] = auth()->id();

        Inventory::create($validated);

        return redirect()->route('admin.inventory.index')
                        ->with('success', 'Inventory item created successfully.');
    }
    
    public function show(Inventory $inventory, IHPerItemDataTable $DataTable)
    {
        $inventory->load('latestDeployment');
        $listOfDepartment = Department::getAllDepartment();
        $listOfEquipment = Equipment::getAllEquipment();
        $itemHistory = Deployment::getItemHistoryDeployment($inventory->id);    
        $hasDeployment = $inventory->latestDeployment()
                            ->where('status', 'borrowed')
                            ->exists();
    
        $listOfUnit = Unit::getAllUnit();
        $listOfUser = User::getAllUser();
    
        return $DataTable->render('Inventory.details', compact(
            'itemHistory',
            'DataTable',
            'inventory',
            'listOfDepartment',
            'listOfEquipment',
            'listOfUnit',
            'listOfUser',
            'hasDeployment'
        ));
    }
    
    public function edit(Inventory $inventory)
    {
        $listOfEquipment = Equipment::getAllEquipment();
        $listOfUnit = Unit::getAllUnit();
        $listOfUser = User::getAllUser();
        return view('Inventory.edit', compact(
            'inventory',
            'listOfEquipment',
            'listOfUnit',
            'listOfUser'
        ));
    }
    
    public function update(UpdateInventoryRequest $request, Inventory $inventory)
    {
        $validated = $request->validated();
        $validated['updated_by'] = auth()->id();

        $inventory->update($validated);

        return redirect()->route('admin.inventory.index')
                        ->with('success', 'Item updated successfullly.');
    }
    
    public function destroy(Inventory $inventory)
    {
        $deleted = $inventory->delete();

        return redirect()->route('admin.inventory.index')
                        ->with('success', 'Item deleted successfully.');
    }


    public function exportExcel(Request $request)
    {
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
    
        $inventories = Inventory::with([
            'latestDeployment',
            'latestDeployment.departmentName',
            'latestDeployment.issuedName', 
            'latestDeployment.receivedName',
            'unitName', 
            'equipmentName'
        ])
        ->whereHas('latestDeployment', function($query) use ($startDate, $endDate) {
            $query->whereBetween('deploy_date', [$startDate, $endDate]);
        })
        ->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // header
        $headers = [
            'QTY', 'UNIT', 'EQUIPMENT NAME', 'EQUIPMENT TYPE', 'SERIAL NUMBER',
            'REMARK', 'DEPARTMENT', 'ISSUED TO', 'ISSUED BY', 'RECEIVED BY',
            'DATE DEPLOY', 'STATUS', 'RETURNED BY', 'RETURN DATE', 'RETURNED BY (RECEIVED)'
        ];
        $sheet->fromArray($headers, null, 'A1');

        // Header styling
        $headerStyleArray = [
            'font' => [
                'bold' => true,
                'size' => 13,
                'color' => ['argb' => 'FF000000'],  // header color 
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'argb' => 'FFFF00'  // header fill color
                ]
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ]
        ];
        $sheet->getStyle('A1:O1')->applyFromArray($headerStyleArray);

        // data
        $row = 2;
        foreach ($inventories as $inventory) {
            $data = [
                $inventory->quantity,
                $inventory->unitName->name,
                $inventory->name,
                $inventory->equipmentName->name,
                $inventory->serial_number,
                $inventory->remark,
                $inventory->latestDeployment->departmentName->name ?? 'N/A',
                $inventory->latestDeployment->assigned_to ?? 'N/A',
                $inventory->latestDeployment->issuedName->name ?? 'N/A',
                $inventory->latestDeployment->receivedName->name ?? 'N/A',
                $inventory->latestDeployment->deploy_date ?? 'N/A',
                $inventory->latestDeployment->status ?? 'In Stock',
                $inventory->latestDeployment->return_by ?? 'N/A',
                $inventory->latestDeployment->return_date ?? 'N/A',
                $inventory->latestDeployment->receivedName->name ?? 'N/A'
            ];
            $sheet->fromArray($data, null, 'A' . $row++);
        }

        // Apply border to all cells
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ],
            ]
        ];
        $sheet->getStyle('A1:O' . ($row - 1))->applyFromArray($styleArray);

        // Auto-size columns
        foreach (range('A', 'O') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = "Inventory_Details.xlsx";
        $temp_file = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($temp_file);

        return response()->download($temp_file, $fileName, ['Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']);
    }
}
