@extends('layouts.app')

@section('content')
<div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
	<div class="panel panel-success">
		<div class="panel-heading">
			Blogs
			<a href="/blogs/create"><button type="button" class="pull-right btn btn-sm btn-success">Create New</button></a>
		</div>
		<div class="panel-body">
			<ul class="list-group">
			@foreach($blogs as $blog)
				<li class="list-group-item"><a href="/blogs/{{$blog->id}}">{{$blog->title}}</li>
			@endforeach
			</ul>
		</div>
	</div>
</div>
@stop