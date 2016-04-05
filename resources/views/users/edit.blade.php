@extends('layouts.app')

@section('content')

    <div class="panel-body">
        <!-- Display Validation Errors -->
       <div class="form-group">
	       		@include('partials.notifications')
	   </div>
      
		<form action="{{ route('user.update', $user->id) }}" method="POST" class="form-horizontal">
        	<input name="_method" type="hidden" value="PUT">
        	{!! csrf_field() !!}
        	
        	@include('users.form_update')
			
			
        	
        	<!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update User
                    </button>
                </div>
            </div>
        </form>
        
        <form action="{{ route('user.update_password', $user->id) }}" method="POST" class="form-horizontal">
        	{!! csrf_field() !!}
        	
        	@include('users.form_update_password')
        	
        	<!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Password
                    </button>
                </div>
            </div>
        </form>
    </div>

    
    
@endsection
