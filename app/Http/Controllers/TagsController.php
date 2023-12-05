<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    public function index() {
        $tags = Tag::paginate(5);
        $trashed = Tag::onlyTrashed()->get();
        return view('backend.tags.tags', compact('tags', 'trashed'));
    }
    // tags insert code
    public function insert(Request $request) {
        $request->validate([
            'name' => 'required|string|min:2',
        ]);
        if($request->slug) {
            Tag::insert([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'created_at' => now(),
            ]);
            return back()->with('insert_success', "Tag has been added successfully");
        }else {
            Tag::insert([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'created_at' => now(),
            ]);
            return back()->with('insert_success', "Slug added as Tag name and Tag has been added successfully");
        }
    }
    // tags status code
    public function status(Request $request, $id) {
        $tag = Tag::where('id', $id)->first();
        if($tag->status == 'deactive') {
            Tag::find($id)->update([
                'status' => 'active',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully deactive to active");

        }else {
            Tag::find($id)->update([
                'status' => 'deactive',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully active to deactive");
        }
    }
    // tags delete code
    public function delete(Request $request, $id) {
        Tag::find($id)->delete();
        return back()->with('update_success', "Tag has been move to recycle bin successfully");
    }
    // tags restore code
    public function restore(Request $request, $id) {
        Tag::withTrashed()
        ->where('id', $id)
        ->restore();
        return back()->with('update_success', "Tag has been restored successfully");
    }
    // tags force_delete code
    public function force_delete(Request $request, $id) {
        Tag::withTrashed()
        ->where('id', $id)
        ->forceDelete();
        return back()->with('update_success', "Tag permanently deleted");
    }
}
