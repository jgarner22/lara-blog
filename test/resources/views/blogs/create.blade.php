@extends('layouts.app')

@section('content')
  <div class="col-sm-8 form">
    <h1> Blog Creation</h1>
    <form method="post" action="{{route ('blogs.store')}}">
      {{csrf_field()}}
      <div class="form-group">
          <label for="blog-title">Title</label><br> 
          <input  placeholder="Enter Title" 
                  name="title"  
                  required />
      </div> <!-- form-group -->
      <div class="form-group">
          <label for="blog-body">Body</label><br>
          <textarea rows="4"
                    cols="50"
                    placeholder="Enter Title"
                    name="body" 
                    required></textarea>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit"/>
      </div>
    </form>
  </div> <!-- form -->
  <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module">
      <h4>Actions</h4>
      <ol class="list-unstyled">
        <li><a href="/blogs">Return to Blogs Page</a></li>
      </ol>
    </div> <!-- sidebar-module -->
  </div> <!-- blog-sidebar -->
@stop