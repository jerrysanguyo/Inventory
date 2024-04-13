<?php

namespace App\Http\Controllers;

use App\Models\Deployment;
use App\Models\Department;
use App\Models\User;
use App\Http\Requests\StoreDeploymentRequest;
use App\Http\Requests\UpdateDeploymentRequest;

class DeploymentController extends Controller
{
    public function index()
    {
        //
    }
    
    public function create()
    {
        //
    }
    
    public function store(StoreDeploymentRequest $request)
    {
        $validated=$request->validated();
        $validated['created_by'] = auth()->id();
        $validated['updated_by'] = auth()->id();
        $validated['status'] = "Borrowed";

        Deployment::create($validated);

        $inventoryId = $request->input('inventory');

        return redirect()->route('admin.inventory.show', ['inventory' => $inventoryId])
                        ->with('success', 'Item has been assgined sucessfully');
    }

    public function deploymentReturn(UpdateDeploymentRequest $request, Deployment $deployment)
    {
        $validated = $request->validated();
        $validated['updated_by'] = auth()->id();
        $validated['status'] = "Returned";

        $deployment->update($validated);

        $inventoryId = $request->input('inventory');

        return redirect()->route('admin.inventory.show', ['inventory' => $inventoryId])
                        ->with('success', 'Item return successfully.');
    }
    
    public function show(Deployment $deployment)
    {
        //
    }
    
    public function edit(Deployment $deployment)
    {
        $listOfDepartment = Department::getAllDepartment();
        $listOfUser = User::getAllUser();
        return view('Deployment.edit', compact(
            'listOfUser',
            'listOfDepartment',
            'deployment'
        ));
    }
    
    public function update(UpdateDeploymentRequest $request, Deployment $deployment)
    {
        
        $validated = $request->validated();
        $validated['updated_by'] = auth()->id();

        $deployment->update($validated);

        return redirect()->route('admin.inventory.index')
                        ->with('success', 'Item updated successfullly.');
    }
    
    public function destroy(Deployment $deployment)
    {
        //
    }
}
