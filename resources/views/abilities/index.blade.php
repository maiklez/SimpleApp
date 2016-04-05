@extends('layouts.app')

@section('content')
	
	<div class="container">
    <div class="row">    
		<div class="panel panel-default">
			<div class="panel-heading">Add New Ability</div>
			
		    <div class="panel-body">
		        <!-- Display Validation Errors -->
		       	<div class="form-group">
		       		@include('partials.notifications')
		       	</div>
		       	
				<form action="{{ route('ability.store') }}" method="POST" class="form-horizontal">
		        	@include('abilities.form')
		        	
		        	<!-- Add Task Button -->
		            <div class="form-group">
		                <div class="col-sm-offset-3 col-sm-6">
		                    <button type="submit" class="btn btn-default">
		                        <i class="fa fa-plus"></i> Add Ability
		                    </button>
		                </div>
		            </div>
		        </form>
		    </div>
    	</div>
    </div>
    </div>

    
    <!-- Current Abilities -->
    @if (count($abilities) > 0)
        <div class="container">
    	<div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Users</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($abilities as $ability)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $ability->name }}</div>
                                </td>
								<td class="table-text">
                                    <div>{{ $ability->description }}</div>
                                </td>
                                
                                <td class="table-text">
                                    @foreach($ability->users as $user)
                                    	<div>{{ $user->name }}</div>
                                    @endforeach
                                    
                                </td>
                                
                                <td>
                                     <a class="btn btn-warning glyphicon glyphicon-edit" href={!! route('ability.edit', $ability->id) !!}>
                                     <span>Edit</span></a>
                                     
                                     @include('partials.delete_button', [$url=route('ability.destroy', $ability->id), $id = 'delete-ability-'.$ability->id])
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
