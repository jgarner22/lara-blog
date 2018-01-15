@extends('layouts.app')

@section('content')
  <div class="col-sm-8">
    <h1> Blog Creation</h1>
    <form method="post" action="{{route ('blogs.store')}}">
      {{csrf_field()}}
      <div>
          <label for="blog-title">Title</label><br> 
          <input  placeholder="Enter Title" 
                  name="title"  
                  required />
      </div> <!-- form-group -->
      <div>
          <label for="blog-body">Body</label><br>
          <textarea rows="4"
                    cols="50"
                    placeholder="Enter the contents of the Blog Post"
                    name="body" 
                    required></textarea>
      </div>
      <div>
        <input type="submit" class="btn btn-primary" value="Submit"/>
      </div>
    </form>
  </div> <!-- form -->
  <div class="col-sm-4 col-sm-offset-1">
    <div class="sidebar-module">
      <h4>Actions</h4>
      <ol class="list-unstyled">
        <li><a href="/blogs">Return to Blogs Page</a></li>
      </ol>
    </div> <!-- sidebar-module -->
  </div> <!-- blog-sidebar -->
@stop