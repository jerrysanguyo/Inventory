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
}
