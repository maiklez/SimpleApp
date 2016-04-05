@extends('layouts.app')

@section('content')
	
	<div class="container">
    <div class="row">    
		<div class="panel panel-default">
			<div class="panel-heading">Add New User</div>
	            
		    <div class="panel-body">
		        <!-- Display Validation Errors -->
		       	<div class="form-group">
		       		@include('partials.notifications')
		       	</div>
		       
				<form action="{{ route('user.store') }}" method="POST" class="form-horizontal">
		        	{!! csrf_field() !!}
		        	@include('users.form')
		        	
		        	<!-- Add Task Button -->
		            <div class="form-group">
		                <div class="col-sm-offset-3 col-sm-6">
		                    <button type="submit" class="btn btn-default">
		                        <i class="fa fa-plus"></i> Add User
		                    </button>
		                </div>
		            </div>
		        </form>
		    </div>
		</div>
	
	</div>
	</div>
	    

    
    <!-- Current Users -->
    @if (count($users) > 0)
        <div class="container">
    	<div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Users
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>email</th>
                        <th>Abilities</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $user->name }}</div>
                                </td>
								<td class="table-text">
                                    <div>{{ $user->email }}</div>
                                </td>
                                
                                <td class="table-text">
                                    @foreach($user->abilities as $ability)
                                    	<div>{{ $ability->name }}</div>
                                    @endforeach
                                    
                                </td>
                                
                                <td>
                                     <a class="btn btn-default glyphicon glyphicon-eye-open" href={!! route('user.show', $user->id) !!}>
                                     	<span>Show</span></a>
                                     
                                     <a class="btn btn-warning glyphicon glyphicon-edit" href={!! route('user.edit', $user->id) !!}>
                                     <span>Edit</span></a>
                                     
                                     @include('partials.delete_button', [$url=route('user.destroy', $user->id), $id = 'delete-user-'.$user->id])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        </div>
    @endif
    
@endsection
