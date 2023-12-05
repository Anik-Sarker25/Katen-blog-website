<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function index() {
        $trashedpost = Post::onlyTrashed()->get();
        $posts = Post::with('reletionwithtags')->paginate(5);
        return view('backend.post.post', compact('posts', 'trashedpost'));
    }
    // Add post view code
    public function add_view() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.post.add', compact('categories', 'tags'));
    }
    // Post insert code
    public function insert(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'tag_id' => 'required',
        ]);
        if($request->hasFile('image')) {
            $assign_name = auth()->user()->name."-".date('h-i-s').".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(922, 669);
            $img->save(base_path('public/uploads/post/'.$assign_name), 60);
            $post = Post::create([
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $assign_name,
                'created_at' => now(),
            ]);
            $post->reletionwithtags()->attach($request->tag_id);
            $post->save();
            return redirect()->route('posts')->with('insert_success', "Post has been published successfully");
        }else {
            $post = Post::create([
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id,
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => now(),
            ]);
            $post->reletionwithtags()->attach($request->tag_id);
            $post->save();
            return redirect()->route('posts')->with('insert_success', "Post has been published successfully");
        }
    }
    // Post status code
    public function status($id) {
        $post = Post::where('id', $id)->first();
        if($post->status == 'active') {
            Post::find($id)->update([
                'status' => 'deactive',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully active to deactive");
        }else {
            Post::find($id)->update([
                'status' => 'active',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully deactive to active");
        }
    }
    // Post delete code
    public function delete($id) {
        Post::find($id)->delete();
        return back()->with('update_success', "Post has been move to recycle bin successfully");
    }
    // Post restore code
    public function restore($id) {
        Post::withTrashed()
        ->where('id', $id)
        ->restore();
        return back()->with('update_success', "Post has been restored successfully");
    }
    // Post force_delete code
    public function force_delete(Request $request, $id) {
        if($request->hasFile('image')) {
            $post = Post::withTrashed()->where('id', $id)->first();
            unlink(public_path('uploads/post/'.$post->image));
        }
        Post::withTrashed()
        ->where('id', $id)
        ->forceDelete();
        return back()->with('update_success', "Post permanently deleted");
    }

    // Post edit_view code
    public function edit_view($id) {
        $posts = Post::with('reletionwithtags')->where('id', $id)->first();
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.post.edit', compact('categories', 'tags', 'posts'));
    }
    // Post edit code
    public function edit(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'tag_id' => 'required',
        ]);
        if($request->hasFile('image')) {
            $postImage = Post::where('id',$id)->first();
            unlink(public_path('uploads/post/'.$postImage->image));
            $assign_name = auth()->user()->name."-".date('h-i-s').".".$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'))->resize(922, 669);
            $img->save(base_path('public/uploads/post/'.$assign_name), 60);
            $post = Post::find($id);
            $post->user_id = auth()->user()->id;
            $post->category_id = $request->category_id;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->image = $assign_name;
            $post->updated_at = now();
            $post->reletionwithtags()->sync($request->tag_id);
            $post->save();
            return redirect()->route('posts')->with('update_success', "Post has been updated successfully");
        }else {
            $post = Post::find($id);
            $post->user_id = auth()->user()->id;
            $post->category_id = $request->category_id;
            $post->title = $request->title;
            $post->description = $request->description;
            $post->updated_at = now();
            $post->reletionwithtags()->sync($request->tag_id);
            $post->save();
            return redirect()->route('posts')->with('update_success', "Post has been updated successfully");
        }
    }
}
