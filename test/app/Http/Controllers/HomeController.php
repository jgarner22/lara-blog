<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Blog;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('blogs.index', ['blogs' => $blogs]);
    }
    public function test()
    {
        $test = User::where('name', 'Jordan Garner')->first();
        var_dump($test);
        die();
        return view('test');
    }
}
