<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index() {
        $user = User::where('id', auth()->id())->first();
        return view('backend.profile.index', compact('user'));
    }
    // Profile image update code
    public Function image_update(Request $request, $id) {
        $request->validate([
            'image' => 'required|image',
        ]);
        if($request->hasFile('image')) {
            $assign_name = auth()->user()->name."-".auth()->id().".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(200, 240);
            $img->save(base_path('public/uploads/profile/'.$assign_name), 60);
            User::find($id)->update([
                'image' => $assign_name,
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Profile image has been updated successfully");
        }
    }
    // Tagline insert code
    public Function update_info(Request $request, $id) {
        $request->validate([
            'about_info' => 'required|string|max:255',
        ]);
        User::find($id)->update([
            'about' => $request->about_info,
        ]);
        return back()->with('insert_success', "About information updated successfully");
    }
    // name update part
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|min:3',
        ]);
        User::find($id)->update([
            'name' => $request->name,
            'updated_at' => now(),
        ]);
        return back()->with('update_success', "Username has been updated successfully");
    }
    // Email update code
    public function email_update(Request $request, $id) {
        $request->validate([
            'email' => 'required|email:rfc,dns',
        ]);
        User::find($id)->update([
            'email' => $request->email,
            'updated_at' => now(),
        ]);
        return back()->with('update_success', "Email has been updated successfully");
    }
    // Password update code
    public Function password_update(Request $request, $id) {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8|max:30|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
        ]);
        if(Hash::check($request->current_password, auth()->user()->password)) {
            if($request->current_password != $request->password) {
                User::find($id)->update([
                    'password' => Hash::make($request->password),
                    'updated_at' => now(),
                ]);
                return back()->with('update_success', "Password has been updated successfully");
            }else {
                return back()->with('update_failed', "New password cannot be the same");
            }
        }else {
            return back()->with('update_failed', "The password you entered is incorrect");
        }
    }
}
