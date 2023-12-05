<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Sitebio;
use App\Models\Tag;
use Illuminate\Http\Request;

class PersonalPageController extends Controller
{
    public function index() {
        $site = Sitebio::where('status', 'active')->first();

        $post = Post::where('status', 'active')->first();
        $posts = Post::where('status', 'active')->paginate(8);
        $category = Category::all()->take(2);
        $category2 = Category::all()->take(2);
        $all_category = Category::all();
        $tags = Tag::all();
        $popular_posts = Post::orderby('visitor_count', 'desc')->take(3)->get();
        return view('frontend.personal_page.personal', compact('category2', 'post', 'posts', 'site', 'category', 'all_category', 'tags', 'popular_posts'));
    }
}
