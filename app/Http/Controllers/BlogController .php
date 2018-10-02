<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Faker\Factory as Faker;
use Log;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $faker = Faker::create();
        Log::alert("blog-home", ['message' => ucfirst($faker->sentence())]);
        Log::emergency("blog-post", ['message' => ucfirst($faker->sentence())]);
        Log::critical("blog-category", ['message' => ucfirst($faker->sentence())]);
        Log::error("blog-home", ['message' => ucfirst($faker->sentence())]);
        Log::warning("blog-post", ['message' => ucfirst($faker->sentence())]);
        Log::notice("blog-category", ['message' => ucfirst($faker->sentence())]);
        Log::debug("blog-category", ['message' => ucfirst($faker->sentence())]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info("blog-home", ['message' => 'Some one has visited your home page']);
        $blogs = Blog::orderBy('updated_at', 'desc')->paginate(10);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('home', compact('blogs', 'categories'));
    }

    public function category(Category $category)
    {
        Log::info("blog-home", ['message' => 'Blog category page visited: ' . $category->name]);
        $blogs = $category->blogs()->orderBy('updated_at', 'desc')->paginate(10);
        $categories = Category::orderBy('name', 'asc')->get();
        return view('category', compact('blogs', 'categories', 'category'));
    }

    public function post(Blog $blog)
    {
        Log::info("blog-home", ['message' => 'Blog post page visited: ' . str_limit($blog->title, 25)]);
        
        // An example for testing notification
        // This will send an email, becuase we have put blog-post channel with error 
        // level logging in notification config array
        Log::error('blog-post', ['message' => 'This is an error log and will trigger notification service']);
        
        $categories = Category::orderBy('name', 'asc')->get();
        return view('blog', compact('blog', 'categories'));
    }


}
