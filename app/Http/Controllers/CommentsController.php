<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index() {
        $comments = Comment::paginate(4);
        return view('backend.comment.comments', compact('comments'));
    }
    // Comment status code
    public function status($id) {
        $page = Comment::where('id', $id)->first();
        if($page->status == 'deactive') {
            Comment::find($id)->update([
                'status' => 'active',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully deactive to active");
        }else {
            Comment::find($id)->update([
                'status' => 'deactive',
                'updated_at' => now(),
            ]);
            return back()->with('update_success', "Status updated successfully active to deactive");
        }
    }
    // Comment delete code
    public function delete($id) {
        Comment::find($id)->delete();
        return back()->with('update_success', "Comment has been deleted successfully");
    }
}
