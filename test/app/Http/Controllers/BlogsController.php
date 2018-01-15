<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        return view('home');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //If the user is  logged in
        if (Auth::check()) {
            $blog = Blog::create([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'author_id' => Auth::user()->id
            ]);
        

            if ($blog) {

                return redirect()->route('blogs.show', ['blog'=> $blog->id])
                ->with('success', 'Blog was created successfully');
            }
        }
        return back()->withInput()->with('errors', 'Error creating new blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
        $blog = Blog::find($blog->id);
        return view('blogs.show', ['blog'=>$blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        $blog = Blog::find($blog->id);
        return view('blogs.edit', ['blog'=>$blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //save data
        $blogUpdate = Blog::where('id', $blog->id)
                            ->update([
                                'title' => $request->input('title'),
                                'body' => $request->input('body') 
                                ]);
        //If it succeeds
        if ($blogUpdate) {
            return redirect()->route('blogs.show', ['blog'=>$blog->id])
                ->with('success', 'Blog updated successfully');
        }
        //if it fails, return me to previous page 
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //dd($blog);

        $findBlog = Blog::find($blog->id);
        if ($findBlog->delete()) {

            //redirect back to the blog main page
            return redirect()->route('blogs.index')
                ->with('success', 'Blog has been deleted successfully');
        }

        return back()->withInput()->with('error', 'Blog could not be deleted');
    }
}
