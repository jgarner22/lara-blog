@extends('layouts.app')

@section('content')
  <div class="col-sm-8 blog-main">
    <h2 class="blog-post-title">{{$blog->title}}</h2>
    <p class="blog-post-meta">{{$blog->created_at}} by {{$blog->author_id}}</p>
    <p>{{$blog->body}}</p>
  </div><!-- /.blog-main -->
  <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <h4>Actions</h4>
    <ol class="list-unstyled">
      <li><a href="/blogs">Return to Blogs Page</a></li>
      <li><a href="/blogs/{{$blog->id}}/edit">Edit</a></li>
      <li><!-- Beginning of Delete Link -->
        <a href="#" 
            onclick="var result = confirm('Are you sure you want to delete {{$blog->title}}?');
              if (result ){
                event.preventDefault();
                document.getElementById('delete-form').submit();
              }">
              Delete
        </a>
        <form id="delete-form" action="{{ route('blogs.destroy', [$blog->id]) }}" method="POST" style="display: none;">
          <input type="hidden" name="_method" value="delete">
          {{csrf_field()}}
        </form>
      </li> <!-- Delete Link End -->
    </ol>
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="../../dist/js/bootstrap.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
@stop