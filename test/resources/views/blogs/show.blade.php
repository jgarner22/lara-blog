@extends('layouts.app')

@section('content')
  <!-- blog-main -->
  <div class="col-sm-8 container">
    <h2>{{$blog->title}}</h2>
    <p>{{$blog->created_at}} by {{$blog->author_id}}</p>
    <p>{{$blog->body}}</p>



    <!-- Comments Section -->
    <form method="post" action="route ('comments.store')">
          {{csrf_field()}}

      <input type="hidden" name="blog_id" value="{{$blog->id}}">

        <div class="form-group">
          <br> 
          <textarea rows="3"
                    cols="50"
                    placeholder="Enter your comment here"
                    name="body" 
                    required></textarea>
        </div>
        <div>
            <input type="submit" class="btn btn-primary" value="Post Comment"/>
        </div>
    </form>
  </div>


  <!-- Sidebar -->
  <div class="col-sm-3 col-sm-offset-1">
    <h4>Actions</h4>
    <ol class="list-unstyled">
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
      </li> <!-- End of Delete -->
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