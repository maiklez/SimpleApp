@extends('layouts.app')


@section('title')
MaikBlog - 
@stop

@section('content')
	
	<!-- Current Posts -->
    
        <div class="container">
    	<div class="row">
        <div class="panel panel-post">
            
            @if(!Auth::guest() && ($post->author_id == Auth::user()->id || Auth::user()->is_admin()))
				<button class="btn" style="float: right"><a href="{{ url('post/'.$post->id .'/edit')}}">Edit Post</a></button>
			@endif

            <div class="panel-body">
                 
					
					<div><h2>{{ $post->title }}</h2></div>
					<div class="post-published">Published by {{ $post->author->name }} on {{ $post->created_at->format('M d,Y') }}</div>
					<div class="post-body">{!!  $post->body !!}</div>
					
					 
					 <!-- The Comments -->
					 <div style="margin-top:40px;">
						<h2>Deja tu comentario!</h2>
					</div>           
                 	
                 	@if(Auth::guest())  
						<p><a href="{{ url('/login')}}">Login</a> para comentar</p>
					@else
						<div class="panel-body">
							<form method="post" action="{!! route('add_comment', $post->id) !!}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="on_post" value="{{ $post->id }}">
								<input type="hidden" name="slug" value="{{ $post->slug }}">
								<div class="form-group">
									<textarea required="required" placeholder="Enter comment here" name = "body" class="form-control"></textarea>
								</div>
								<input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
							</form>
						</div>
					@endif
					
					<div>
						@if(isset($comments))
						<ul style="list-style: none; padding: 0">
							@foreach($comments as $comment)
								<li class="panel-body">
									<div class="list-group">
										<div class="list-group-item">
											<h3>{{ $comment->author->name }}</h3>
											<p>{{ $comment->created_at->format('M d,Y \a\t h:i a') }}</p>
										</div>
										<div class="list-group-item">
											<p>{{ $comment->body }}</p>
										</div>
									</div>
								</li>
							@endforeach
						</ul>
						@endif
					</div>      
                 	<!-- end comments -->
            </div>
        </div>
        </div>
        </div>
    

@stop