<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Sitebio;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(Request $request) {
        $site = Sitebio::where('status', 'active')->first();
        $posts = Post::latest()->take(3)->get();
        $trending = Post::latest()->take(4)->get();
        $categories = Category::all();
        $specific_cat = $categories[0];
        $specific_cat1 = $categories[1];
        $category = Category::all()->take(2);
        $tags = Tag::all();
        $popular_posts = Post::orderby('visitor_count', 'desc')->take(4)->get();
        $recent_posts = Post::orderBy('id','desc')->take(4)->get();
        $featured_posts = Post::orderBy('id','desc')->take(1)->first();
        $featured_posts2 = Post::orderBy('id','asc')->take(4)->get();
        // $search_value = $request->search_item;
        // $items = Post::where('title','like', "%$search_value%")->orWhere('description','like', "%$search_value%")->get();
        return view('home', compact('site', 'trending', 'posts', 'specific_cat1', 'featured_posts2', 'specific_cat', 'category', 'categories', 'tags', 'popular_posts', 'recent_posts', 'featured_posts'));
    }
}
