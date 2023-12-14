<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'isAdmin']);
    }
    public function index() {
        $users = User::all();
        $roles = Role::getRoles();

        return view('admin.manage-user')
            ->with('roles', $roles)
            ->with('users', $users);
    }

    public function updateRole(Request $request) {
        $user = User::find($request->id);
        $user->role_id = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'User role updated successfully');
    }

    public function delete($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
