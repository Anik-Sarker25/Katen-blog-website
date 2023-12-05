<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Sitebio;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendSinglePostController extends Controller
{
    public function index($id) {
        $site = Sitebio::where('status', 'active')->first();
        $single_post = Post::where('id', $id)->first();
        $categories = Category::all();
        $category = Category::all()->take(2);
        $category2 = Category::all()->take(2);
        $tags = Tag::all();
        $popular_posts = Post::orderby('visitor_count', 'desc')->take(3)->get();
        $comments = Comment::with('reletionwithreply')->where('status', 'active')->where('post_id', $id)->whereNull('parent_id')->get();
        return view('frontend.single_post.index', compact('comments', 'category2', 'site', 'single_post', 'popular_posts', 'category', 'categories', 'tags'));
    }
}
