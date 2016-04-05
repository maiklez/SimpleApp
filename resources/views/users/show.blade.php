@extends('layouts.app')

@section('content')
	
	<div class="container">
    <div class="row">    
		<div class="panel panel-default">
			<div class="panel-heading">User Info</div>
			
		    <div class="panel-body">
		        <!-- Display Validation Errors -->        
		            <!-- Task Name -->
		            <div class="form-group row">
		                <label for="user-name" class="col-sm-3 control-label">User Name</label>				
						<label  class="col-sm-6">{!!$user->name!!}</label>
		            
		            </div>
		            
		            
		 			<div class="form-group row">
		                <label for="user-email" class="col-sm-3 control-label">E mail</label>
		            	<label  class="col-sm-6">{!!$user->email!!}</label>
		            </div>
					
					
		            <!-- Abilities -->
		            <div class="form-group row">
		                <label for="ability[]" class="col-sm-3 control-label">Abilities</label>
		                
		                <div class="col-sm-6">
		                @foreach ($selectedAbilities as $ability)
							<label  class="">{!!$ability->name!!}</label><br>
		           		@endforeach
						</div>
		            </div>
					
		            <a class="fa fa-plus" href={!! route('user.edit', $user->id) !!}>Edit</a>
		               
		      
				
		    </div>
    	</div>
    </div>
    </div>

    
    
@endsection
