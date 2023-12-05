<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\Sitebio;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendCategoryPostController extends Controller
{
    public function index($id) {
        $site = Sitebio::where('status', 'active')->first();
        $post = Post::where('category_id', $id)->first();
        $posts = Post::where('category_id', $id)->paginate(8);
        $categories = Category::where('id', $id)->first();
        $category = Category::all()->take(2);
        $category2 = Category::all()->take(2);
        $all_category = Category::all();
        $tags = Tag::all();
        $popular_posts = Post::orderby('visitor_count', 'desc')->take(3)->get();
        return view('frontend.category_page.category_post', compact('category2', 'site', 'post', 'posts', 'categories', 'category', 'all_category', 'tags', 'popular_posts'));
    }

    public function tag_post($id) {
        $site = Sitebio::where('status', 'active')->first();
        $post = Post::where('category_id', $id)->first();
        $posts = Post::where('category_id', $id)->paginate(8);
        $categories = Category::where('id', $id)->first();
        $category = Category::all()->take(2);
        $category2 = Category::all()->take(2);
        $all_category = Category::all();
        $tags = Tag::all();
        $popular_posts = Post::orderby('visitor_count', 'desc')->take(3)->get();
        $tags_name = Tag::where('id', $id)->first();
        $fortagpost = Tag::with('reletionwithposts')->where('id', $id)->get();
        $tag_posts = $fortagpost[0]->reletionwithposts()->paginate(8);
        return view('frontend.category_page.tag_post', compact('category2', 'site', 'post', 'posts', 'tags_name', 'tag_posts', 'categories', 'category', 'all_category', 'tags', 'popular_posts'));
        // return view('frontend.category_page.tag_post', compact('tags_name', 'categories', 'category', 'all_category', 'tags', 'popular_posts', 'posts', 'tag_posts'));
    }
}
