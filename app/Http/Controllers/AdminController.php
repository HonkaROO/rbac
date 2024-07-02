<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers(){
        $users = User::select('id','name','email')->paginate(10);
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.manageUsers')->with(compact('users', 'roles', 'permissions'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $permissions = Permission::all();
        
        return view('admin.editUser', compact('user', 'roles', 'permissions'));
    }
    
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'roles' => 'array',
            'permissions' => 'array',
        ]);
    
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);
    
        if (isset($validated['roles'])) {
            $user->roles()->sync($validated['roles']);
        }
    
        if (isset($validated['permissions'])) {
            $user->permissions()->sync($validated['permissions']);
        }
    
        return redirect()->route('usertool')->with('success', 'User updated successfully');
    }
    
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    
        return redirect()->route('usertool')->with('success', 'User deleted successfully');
    }
}
