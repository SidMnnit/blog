<?php

namespace App\Http\Controllers;

class PagesController extends Controller{
    public function getIndex(){
        return view('pages.welcome');
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
