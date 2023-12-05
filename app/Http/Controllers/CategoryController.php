<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::paginate(5);
        $trashed = Category::onlyTrashed()->get();
        return view('backend.category.category', compact('categories', 'trashed'));
    }
    // Category insert code
    public function insert(Request $request) {
        $request->validate([
            'name' => 'required|string|min:3',
            'image' => 'required|image',
        ]);
        if($request->hasFile('image')) {
            $assign_name = auth()->user()->name."-".date('h-i-s').".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(200, 200);
            $img->save(base_path('public/uploads/category/'.$assign_name), 60);

            if($request->slug) {
                Category::insert([
                    'title' => $request->name,
                    'image' => $assign_name,
                    'slug' => Str::slug($request->slug),
                    'created_at' => now(),
                ]);
                return back()->with('insert_success', "Category has been inserted successfully");
            }else {
                Category::insert([
                    'title' => $request->name,
                    'image' => $assign_name,
                    'slug' => Str::slug($request->name),
                    'created_at' => now(),
                ]);
                return back()->with('insert_success', "Slug added as Category name and Category has been inserted successfully");
            }
        }
    }
    // Category Edit_view code
    public function edit_view($id) {
        $categories = Category::where('id', $id)->first();
        return view('backend.category.category_edit', compact('categories'));
    }
    // Category Edit code
    public function edit(Request $request, $id) {
        $request->validate([
            'name' => 'required|string|min:3',
        ]);

        if($request->hasFile('image')) {
            $category = Category::where('id', $id)->first();
            unlink(public_path('uploads/category/'.$category->image));
            $assign_name = auth()->user()->name."-".date('h-i-s').".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(200, 200);
            $img->save(base_path('public/uploads/category/'.$assign_name), 60);
            if($request->slug) {
                Category::find($id)->update([
                    'title' => $request->name,
                    'image' => $assign_name,
                    'slug' => Str::slug($request->slug),
                    'updated_at' => now(),
                ]);
                return redirect()->route('categories')->with('update_success', "Category has been updated successfully");
            }else {
                Category::find($id)->update([
                    'title' => $request->name,
                    'image' => $assign_name,
                    'slug' => Str::slug($request->name),
                    'updated_at' => now(),
                ]);
                return redirect()->route('categories')->with('update_success', "Slug added as Category name and Category has been updated successfully");
            }
        }else {
            Category::find($id)->update([
                'title' => $request->name,
                'slug' => Str::slug($request->slug),
                'updated_at' => now(),
            ]);
            return redirect()->route('categories')->with('update_success', "Category has been updated successfully");
        }
    }
    // Category status code
    public function status(Request $request, $id) {
        $category = Category::where('id', $id)->first();
        if($category->status == 'deactive') {
            Category::find($id)->update([
                'status' => 'active',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully deactive to active");

        }else {
            Category::find($id)->update([
                'status' => 'deactive',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully active to deactive");
        }

    }
    // Category delete code
    public function delete(Request $request, $id) {
        Category::find($id)->delete();
        return back()->with('update_success', "Category has been move to recycle bin successfully");
    }
    // Category restore code
    public function restore(Request $request, $id) {
        Category::withTrashed()
        ->where('id', $id)
        ->restore();
        return back()->with('update_success', "Category has been restored successfully");
    }
    // Category force_delete code
    public function force_delete(Request $request, $id) {
        $category = Category::withTrashed()->where('id', $id)->first();
        unlink(public_path('uploads/category/'.$category->image));
        Category::withTrashed()
        ->where('id', $id)
        ->forceDelete();
        return back()->with('update_success', "Category permanently deleted");
    }
}
