<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // model
use DB; // when you want to use SQL query

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // this is how you query in SQL 
        // $posts = DB::select('SELECT * FROM posts');

        // this is how you query in Eloquent
        // return Post::where('title','Post Two')->get();
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();

        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        //Create Post
        $post =  new Post;
        $post->title =  $request->input('title');
        $post->body =  $request->input('body');
        $post->save();

        // with here indidcate the success nofication after you save it
        return redirect('/posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     * This is triggered when you pass an idea ex: (http://lsapp.build/posts/2)
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
