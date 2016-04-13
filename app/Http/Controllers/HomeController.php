<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Maiklez\MaikBlog\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    
    /**
     * Show the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
    	$posts = Post::paginate(5);
    
    
    	return view('welcome', [
    			'posts' => $posts,
    	]);
    }
    
    /**
     * Show one post
     *
     * @return \Illuminate\Http\Response
     */
    public function the_post($slug)
    {
    	$post = Post::where('slug', 'like',$slug)->first();
    
    
    	return view('one_post', [
    			'post' => $post,
    	]);
    }
}
