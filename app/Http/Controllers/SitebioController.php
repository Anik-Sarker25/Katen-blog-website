<?php

namespace App\Http\Controllers;

use App\Models\Sitebio;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SitebioController extends Controller
{
    public function index() {
        $details = Sitebio::paginate(5);
        return view('backend.setting.sitebio', compact('details'));
    }
    // Setting insert code
    public function insert(Request $request) {
        $request->validate([
            'sitetitle' => 'required|max:255',
            'tagline' => 'required|max:255',
            'image' => 'required|image',
        ]);
        if($request->hasFile('image')) {
            $assign_name = auth()->user()->name."-".date('h-i-s').".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(164, 40);
            $img->save(base_path('public/uploads/sitelogo/'.$assign_name), 60);
            Sitebio::insert([
                'site_title' => $request->sitetitle,
                'tagline' => $request->tagline,
                'logo' => $assign_name,
                'created_at' => now(),
            ]);
            return back()->with('insert_success', "Info title added successfully");
        }

    }
    // Settting edit_view code
    public function edit_view($id) {
        $bio = Sitebio::where('id', $id)->first();
        return view('backend.setting.edit', compact('bio'));
    }
    // setting Edit code
    public function edit(Request $request, $id) {
        $request->validate([
            'sitetitle' => 'required|max:255',
            'tagline' => 'required|max:255',
        ]);

        if($request->hasFile('image')) {
            $bio = Sitebio::where('id', $id)->first();
            unlink(public_path('uploads/sitelogo/'.$bio->logo));
            $assign_name = auth()->user()->name."-".date('h-i-s').".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(164, 40);
            $img->save(base_path('public/uploads/sitelogo/'.$assign_name), 60);

            Sitebio::find($id)->update([
                'site_title' => $request->sitetitle,
                'tagline' => $request->tagline,
                'logo' => $assign_name,
                'updated_at' => now(),
            ]);
            return redirect()->route('setting')->with('update_success', "Info has been updated successfully");

        }else {
            Sitebio::find($id)->update([
                'site_title' => $request->sitetitle,
                'tagline' => $request->tagline,
                'updated_at' => now(),
            ]);
            return redirect()->route('setting')->with('update_success', "Info has been updated successfully");
        }
    }
    // Setting status code
    public function status($id) {
        $bio = Sitebio::where('id', $id)->first();
        if($bio->status == 'deactive') {
            Sitebio::find($id)->update([
                'status' => 'active',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully deactive to active");
        }else {
            Sitebio::find($id)->update([
                'status' => 'deactive',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully active to deactive");
        }
    }
    // Page delete code
    public function delete($id) {
        Sitebio::find($id)->delete();
        return back()->with('update_success', "Details has been deleted successfully");
    }

}
