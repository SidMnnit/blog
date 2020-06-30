<?php

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller{
    public function getIndex(){
        $posts=Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome')->withPosts($posts);
    }
    public function getAbout(){
        # process any variable data or parameter
        # talk to the model
        # receive data back from the model
        # compile or process data from the model if needed
        # pass that data to the correct view
        return view('pages.about');
    }
    public function getContact(){
        return view('pages.contact');
    }
   
}
