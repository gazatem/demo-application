<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;


class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('updated_at', 'desc')->paginate(10);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('home', compact('blogs', 'categories'));
    }

    public function category(Category $category)
    {
        $blogs = $category->blogs()->orderBy('updated_at', 'desc')->paginate(10);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('category', compact('blogs', 'categories', 'category'));
    }

    public function post(Blog $blog)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('blog', compact('blog', 'categories'));
    }


}
