@extends('layouts.app')

@section('content')
  <div class="col-sm-8 form">
    <h1> Blog Edit</h1>
    <form method="post" action="{{route ('blogs.update', [$blog->id])}}">
      {{csrf_field()}}
      <div>
        <input type="hidden" name="_method" value="put"/>
        <label for="blog-title">Title</label><br> 
        <input  placeholder="Enter Title"
                id="blog-title" 
                name="title" 
                value="{{$blog->title}}" 
                required />
      </div>
      <div>
        <label for="blog-body">Body</label><br>
        <textarea rows="4"
                  cols="50"
                  placeholder="Enter Title"
                  id="blog-body"
                  name="body" 
                  required>{{$blog->body}}</textarea>
      </div>
      <div>
        <input type="submit" class="btn btn-primary" value="Submit"/>
      </div>
    </form>
  </div> <!-- form -->
  <div class="col-sm-3 col-sm-offset-1">
    <div>
      <h4>Actions</h4>
      <ol class="list-unstyled">
        <li><a href="/blogs">Return to Blogs Page</a></li>
      </ol>
    </div> <!-- sidebar-module -->
  </div> <!-- blog-sidebar -->
@stop