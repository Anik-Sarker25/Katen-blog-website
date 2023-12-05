<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Sitebio;
use App\Models\Tag;
use Illuminate\Http\Request;

class FrontendSinglePageController extends Controller
{
    public function index() {
        $site = Sitebio::where('status', 'active')->first();
        $category = Category::all()->take(2);
        return view('frontend.single_page.contact', compact('site', 'category'));
    }
    public function about() {
        $page = Page::where('status', 'active')->first();
        $site = Sitebio::where('status', 'active')->first();
        $category = Category::all()->take(2);
        $all_category = Category::all();
        $tags = Tag::all();
        $popular_posts = Post::orderby('visitor_count', 'desc')->take(3)->get();
        return view('frontend.single_page.about', compact('page', 'site', 'category', 'all_category', 'tags', 'popular_posts'));
    }
}
