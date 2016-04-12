@extends('layouts.app')


@section('title')
MaikBlog - 
@stop

@section('content')
	
	<!-- Current Posts -->
    
        <div class="container">
    	<div class="row">
        <div class="panel panel-post">
            

            <div class="panel-body">
                 
					
					<div><h2>{{ $post->title }}</h2></div>
					<div class="post-published">Published by {{ $post->author->name }} on {{ $post->created_at->format('M d,Y') }}</div>
					<div class="post-body">{!!  $post->body !!}</div>
					
					            
                 
            </div>
        </div>
        </div>
        </div>
    

@stop