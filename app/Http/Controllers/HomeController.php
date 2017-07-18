<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Maiklez\MaikBlog\Models\Post;
use Maiklez\MaikBlog\Models\Category;
use Maiklez\MaikBlog\Models\Tag;

use Auth;

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
     * politica de privacidad
     *
     * @return \Illuminate\Http\Response
     */
    public function privacidad()
    {
    	
    	$name = 'maik.rocks';
    
    	return view('tyc', [
    			'name' => $name,
    	]);
    }
    
    /**
     * Show the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
    	$posts = Post::orderBy('created_at', 'desc')->paginate(5);
    
    
    	return view('welcome', [
    			'posts' => $posts,
    	]);
    }
    
    /**
     * Show the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function portfolio()
    {
    
    
    	return view('portfolio', [

    			
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
    			'comments' => $post->comments,
    	]);
    }
    
    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    	$this->authorize('blog',  Auth::user());
    
    	$this->validate($request, Post::storeRules());
    
    	$this->validate($request, Category::storeRules());
    	$this->validate($request, Tag::storeRules());
    	
    	\DB::transaction(function () use ($request){
    		$post = Post::create(Post::storeAttributes($request));
    		
    		$categories = explode(',', $request->categories);
    		// remove empty items from array
    		$categories = array_filter($categories);
    		// trim all the items in array
    		$categories =array_map('trim', $categories);
    		
    		$post->saveCategories($categories);   		 
    		
    		$tags = explode(',', $request->tags);
    		
    		// remove empty items from array
    		$tags = array_filter($tags);
    		// trim all the items in array
    		$tags =array_map('trim', $tags);
    		
    		$post->saveTags($tags);
    		    		
    		
    	});
    	
    
    
    	return redirect(route('blog'));
    }
}
