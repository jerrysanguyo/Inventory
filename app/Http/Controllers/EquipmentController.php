<?php

namespace App\Http\Controllers;

use App\DataTables\EquipmentDataTable;
use App\Models\Equipment;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;

class EquipmentController extends Controller
{
    public function index(EquipmentDataTable $DataTable)
    {
        $listOfEquipment=Equipment::getAllEquipment();
        return $DataTable->render('Equipment.index', compact(
            'listOfEquipment',
            'DataTable'
        ));
    }
    
    public function create()
    {
        return view('Equipment.create');
    }
    
    public function store(StoreEquipmentRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = auth()->id();
        $validated['updated_by'] = auth()->id();

        Equipment::create($validated);

        return redirect()->route('admin.equipment.index')
                        ->with('success', 'Equipment created successfully.');
    }
    
    public function edit(Equipment $equipment)
    {
        return view('Equipment.edit', compact('equipment'));
    }
    
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $validated = $request->validated();
        $validated['updated_by'] = auth()->id();

        $equipment->update($validated);

        return redirect()->route('admin.equipment.index')
                        ->with('success', 'Equipment updated successfully.');
    }
    
    public function destroy(Equipment $equipment)
    {
        $deleted = $equipment->delete();

        return redirect()->route('admin.equipment.index')
                        ->with('success', 'Equipment deleted successfully.');
    }
}
