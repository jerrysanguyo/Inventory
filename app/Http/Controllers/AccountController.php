<?php

namespace App\Http\Controllers;

use App\DataTables\AccountDataTable;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index(AccountDataTable $DataTable)
    {
        $listOfUser = User::getAllUser();
        return $DataTable->render('Account.index', compact(
            'listOfUser'
        ));
    }
    
    public function create()
    {
        return view('Account.create');
    }
    
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = 'user';
    
        User::create($validated);
    
        return redirect()->route('admin.account.index')
                         ->with('success', 'Account created successfully.');
    }
    
    public function show(User $user)
    {
        //
    }
    
    public function edit(User $account)
    {
        return view('Account.edit', compact(
            'account'
        ));
    }
    
    public function update(UpdateUserRequest $request, User $account)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        $account->update($validated);

        return redirect()->route('admin.account.index')
                        ->with('success', 'Account updated successfullly.');
    }
    
    public function destroy(User $account)
    {
        $deleted = $account->delete();

        return redirect()->route('admin.account.index')
                        ->with('success', 'Account deleted successfully.');
    }

    public function makeUser(User $account)
    {
        $account->update(['role' => 'user']);
    
        return redirect()->route('admin.account.index') 
                         ->with('success', 'Role updated successfully.');
    }

    public function makeAdmin (User $account)
    {
        $account->update(['role' => 'admin']);
    
        return redirect()->route('admin.account.index') 
                         ->with('success', 'Role updated successfully.');
    }
}
