<?php

namespace App\Http\Controllers;

use App\Models\Deployment;
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

        Deployment::create($validated);

        return redirect()->route('admin.inventory.show')
                        ->with('success', 'Item has been assgined sucessfully');

    }
    
    public function show(Deployment $deployment)
    {
        //
    }
    
    public function edit(Deployment $deployment)
    {
        //
    }
    
    public function update(UpdateDeploymentRequest $request, Deployment $deployment)
    {
        
        $validated = $request->validated();
        $validated['updated_by'] = auth()->id();

        $inventory->update($validated);

        return redirect()->route('admin.inventory.index')
                        ->with('success', 'Item updated successfullly.');
    }
    
    public function destroy(Deployment $deployment)
    {
        //
    }
}
