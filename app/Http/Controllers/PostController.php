<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all blog posts
            $posts = Post::orderBy('id', 'desc')->paginate(7);
        //Return View with passed data
            return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Request Validation
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255',
                'category_id' => 'required|integer',
                'body' => 'required'
            ));

        //Store Request
            $post = new Post;

            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->category_id = $request->category_id;
            $post->body = $request->body;

            $post->save();

            //Assign tags to post
                $post->tags()->sync($request->tags, false);

            Session::flash('success', 'Your blog post was saved successfully!');

        //If Request? 
            return redirect()->route('post.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->withPost($post);

    }

    /**  
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Get post id
            $post = Post::find($id);

        //Get categories data
            $categories = Category::all();
                //binding to select form
                    $cats = array();
                    foreach ($categories as $category) {
                        $cats[$category->id] = $category->name;
                    }

        //Get tags data
            $tags = Tag::all();
                //binding to select form
                    $post_tags = array();
                    foreach ($tags as $tag) {
                        $post_tags[$tag->id] = $tag->name;
                    }

        //Return View with passed data 
            return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($post_tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate data
            //
            $post = Post::find($id);

            //if slug hasn't changed
                if ($request->input('slug') == $post->slug) {
                    $this->validate($request, array(
                        'title' => 'required|max:255',
                        'category_id' => 'required|integer',
                        'body' => 'required'
                    ));
                }else{//If slug has changed
                    $this->validate($request, array(
                        'title' => 'required|max:255',
                        'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                        'category_id' => 'required|integer',
                        'body' => 'required'
                    ));
                }
            
        //Save to Database
            $post = Post::find($id);

            $post->title = $request->input('title');
            $post->slug = $request->input('slug');
            $post->category_id = $request->input('category_id');
            $post->body = $request->input('body');

            $post->save();

             //Assign tags to post
               if (isset($request->tags)) {
                    $post->tags()->sync($request->tags);
               }else{
                    $post->tags()->sync(array());
               }

        //Set flash message
            Session::flash('success', 'Your blog post was updated successfully!');

        //If saved? Redirect with passed data
            return redirect()->route('post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get post id
            $post = Post::find($id);

        $post->tags()->detach();

        //Destroy post
            $post->delete();

        //Set flash message
            Session::flash('success', 'Your blog post was deleted successfully!');

        //If deleted? Redirect    
        return redirect()->route('post.index');
    }
}
