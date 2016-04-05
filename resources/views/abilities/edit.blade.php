@extends('layouts.app')

@section('content')

    <div class="panel-body">
        <!-- Display Validation Errors -->
       <div class="form-group">
	       		@include('partials.notifications')
	   </div>
	   
		<form action="{{ route('ability.update', $ability->id) }}" method="POST" class="form-horizontal">
        	<input name="_method" type="hidden" value="PUT">
        	
        	@include('abilities.form')
        	
        	<!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Update Ability
                    </button>
                </div>
            </div>
            
        </form>
    </div>

    
    
@endsection
