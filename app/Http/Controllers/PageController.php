<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $pages = Page::paginate(6);
        $trashedpage = Page::onlyTrashed()->get();
        return view('backend.pages.page', compact('pages', 'trashedpage'));
    }
    // page add view code
    public function add_view() {
        return view('backend.pages.add');
    }
    // page add code
    public function insert(Request $request) {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
        ]);
        Page::insert([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'created_at' => now(),
        ]);
        return redirect()->route('pages')->with('insert_success', "Page has been added successfully");
    }
    // Page status code
    public function status($id) {
        $page = Page::where('id', $id)->first();
        if($page->status == 'deactive') {
            Page::find($id)->update([
                'status' => 'active',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully deactive to active");
        }else {
            Page::find($id)->update([
                'status' => 'deactive',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully active to deactive");
        }
    }
    // Page edit_view code
    public function edit_view($id) {
        $pages = Page::where('id', $id)->first();
        return view('backend.pages.edit', compact('pages'));
    }
    // Page edit code
    public function edit(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string',
        ]);
        Page::find($id)->update([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'updated_at' => now(),
        ]);
        return redirect()->route('pages')->with('update_success', "Page has been updated successfully");
    }
    // Page delete code
    public function delete($id) {
        Page::find($id)->delete();
        return back()->with('update_success', "Page has been move to recycle bin successfully");
    }
    // Page restore code
    public function restore($id) {
        Page::withTrashed()
        ->where('id', $id)
        ->restore();
        return back()->with('update_success', "Page has been restored successfully");
    }
    // Page force_delete code
    public function force_delete($id) {
        Page::withTrashed()
        ->where('id', $id)
        ->forceDelete();
        return back()->with('update_success', "Page permanently deleted");
    }
}
