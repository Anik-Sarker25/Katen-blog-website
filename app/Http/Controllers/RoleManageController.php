<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RoleManageController extends Controller
{
    public function index() {
        $all_users = User::all();
        return view('backend.userrole.user', compact('all_users'));
    }
    // user add view code
    public function add_view() {
        return view('backend.userrole.add');
    }
    // user add view code
    public function insert(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|confirmed|min:8|max:30|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ]);
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'approve_status' => true,
            'created_at' => now(),
        ]);
        return redirect()->route('users')->with('insert_success', "User has been added successfully");
    }
    // user role edit code
    public function edit(Request $request, $id) {
        User::find($id)->update([
            'role' => $request->role,
            'updated_at' => now(),
        ]);
        return back()->with('update_success', "Role has been updated successfully");
    }
    // user delete code
    public function delete($id) {
        User::find($id)->delete();
        return back()->with('update_success', "User has been parmanently deleted successfully");
    }

}
