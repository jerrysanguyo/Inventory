<?php

namespace App\Http\Controllers;

use App\DataTables\DepartmentDataTable;
use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    //view for index department
    public function index(DepartmentDataTable $DataTable)
    {
        $listOfDepartment = Department::getAllDepartment();
        return $DataTable->render('Department.index', compact(
            'listOfDepartment',
            'DataTable'
        ));
    }
    //create page for department
    public function create()
    {
        return view('Department.create');
    }
    //store page for department
    public function store(StoreDepartmentRequest $request)
    {
        $validated = $request->validated();
        $validated['created_by'] = auth()->id();
        $validated['updated_by'] = auth()->id();

        Department::create($validated);

        return redirect()->route('admin.department.index')
                         ->with('success', 'Department created successfully.');
    }
    //edit page
    public function edit(Department $department)
    {
        return view('Department.edit', compact('department'));
    }
    //update form
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $validatedData = $request->validated();
        $validated['updated_by'] = auth()->id();
    
        $department->update($validatedData);
    
        return redirect()->route('admin.department.index')
                        ->with('success', 'Department updated successfully.');
    }
    //delete 1 row
    public function destroy(Department $department)
    {
        $deleted = $department->delete();

        return redirect()->route('admin.department.index')
                        ->with('success', 'Department deleted successfully.');
    }
}
