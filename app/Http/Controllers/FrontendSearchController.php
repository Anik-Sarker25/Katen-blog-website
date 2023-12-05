<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\Sitebio;
use App\Models\Tag;

use Illuminate\Http\Request;

class FrontendSearchController extends Controller
{
    public function index(Request $request) {


        $search_value = $request->search_item;
        $posts = Post::where('title','like', "%$search_value%")->orWhere('description','like', "%$search_value%")->orWhere('category_id', 'like', "%$search_value%")->get();
        $all_category = Category::where('title','like', "%$search_value%")->get();
        $site = Sitebio::where('status', 'active')->first();
        $post = Post::where('status', 'active')->first();
        $category = Category::all()->take(2);
        $category2 = Category::all()->take(2);
        $tags = Tag::where('name','like', "%$search_value%")->get();
        $popular_posts = Post::where('title','like', "%$search_value%")->orWhere('description','like', "%$search_value%")->orWhere('category_id', 'like', "%$search_value%")->get();
        return view('frontend.personal_page.personal', compact('posts', 'site', 'post', 'category','category2', 'all_category', 'popular_posts', 'tags'));

    }
}
