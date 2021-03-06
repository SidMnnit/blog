<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and  store all blog posts in it from database
        $posts= Post::orderBy('id','desc')->paginate(5);
        
        //return a view and pass in the above vaiable
        return view('posts.index')->withPosts($posts);
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
        //validate the data
        $this->validate($request, array(
            'title'=>'required|max:255',
            'body'=>'required'

        ));

        //store the data in the database
        $post=new Post;
        $post->title=$request->title;
        $post->body=$request->body;

        $post->save();

        Session::flash('success','The blog post was succesfully saved');

        //redirect the userto another page 
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as a variable
        $post=Post::find($id);

        //return the view and paa in the variable previously created
        return view('posts.edit')->withPost($post);
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
        //Validate the data 
        $this->validate($request, array(
            'title'=>'required|max:255',
            'body'=>'required'

        ));

        //save the data to database
        $post=Post::find($id);

        $post->title=$request->input('title');
        $post->body=$request->input('body');

        $post->save();
        //set flash data with success message
        Session::flash('success','This Post was succesfully saved');

        //redirect with flash data to posts.show
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post= Post::find($id);

        $post->delete();

        Session::flash('success','The post has been successfully deleted');

        return redirect()->route('posts.index');
    }
}
