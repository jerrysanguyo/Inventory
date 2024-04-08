<?php

namespace App\Http\Controllers;

use App\DataTables\UnitDataTable;
use App\Models\Unit;
use App\Http\Requests\StoreUnitRequest;
use App\Http\Requests\UpdateUnitRequest;

class UnitController extends Controller
{
    public function index(UnitDataTable $DataTable)
    {
        $listOfUnit=Unit::getAllUnit();
        return $DataTable->render('Unit.index', compact(
            'listOfUnit',
            'DataTable'
        ));
    }
    
    public function create()
    {
        return view('Unit.create');
    }
    
    public function store(StoreUnitRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = auth()->id();
        $validated['updated_by'] = auth()->id();

        Unit::create($validated);

        return redirect()->route('admin.unit.index')
                         ->with('success', 'Unit created successfully.');
    }
    
    public function edit(Unit $unit)
    {
        return view('Unit.edit', compact('unit'));
    }
    
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $validatedData = $request->validated();
        $validated['updated_by'] = auth()->id();
    
        $unit->update($validatedData);
    
        return redirect()->route('admin.unit.index')
                        ->with('success', 'Unit updated successfully.');
    }
    
    public function destroy(Unit $unit)
    {
        $deleted = $unit->delete();

        return redirect()->route('admin.unit.index')
                        ->with('success', 'Unit deleted successfully.');
    }
}
