<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'isAdmin']);
    }

    public function index()
    {
        $roles = Role::all();
        return view('admin.manage-role')
            ->with('roles', $roles);
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|unique:role'
        ]);

        $role = new Role();
        $role->role = $request->role;
        $role->save();

        return redirect()->back()->with('success', 'Role added successfully');
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->back()->with('success', 'Role deleted successfully');
    }

    public function update(Request $request) {

        $request->validate([
            'role' => 'required|unique:role'
        ]);

        $role = Role::find($request->id);
        $role->role = $request->role;
        $role->save();

        return redirect()->back()->with('success', 'Role updated successfully');
    }
}
