<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request) {
        $request->validate([
            'g-recaptcha-response' => 'required|captcha',
            'name' => 'required|string|min:3',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string|max:500|min:3'
        ]);
        if($request->parent_id) {
            Comment::insert([
                'user_id' => $request->email,
                'post_id' => $request->post_id,
                'parent_id' => $request->parent_id,
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'created_at' => now(),
            ]);
            return back()->with('comment_success', "Your reply added successfully in this comment");
        }else {
            Comment::insert([
                'user_id' => $request->email,
                'post_id' => $request->post_id,
                'name' => $request->name,
                'email' => $request->email,
                'message' => $request->message,
                'created_at' => now(),
            ]);
            return back()->with('comment_success', "Your comment is panding for admin approval");
        }
    }
}
