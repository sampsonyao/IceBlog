<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    //
	public function getIndex(){
		//Fetch all blog posts
			$posts = Post::orderBy('id', 'desc')->paginate(10);
		//Return view with passed data
			return view('blog.index')->withPosts($posts);
	}

    public function getSingle($slug){
		//Get slug from db
    		$post = Post::where('slug', '=', $slug)->first();

		//Return view with passed data
    		return view('blog.single')->withPost($post);
	}


}
