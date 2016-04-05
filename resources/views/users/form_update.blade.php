<!-- New Task Form -->
        
            

            <!-- Task Name -->
            <div class="form-group">
                <label for="user-name" class="col-sm-3 control-label">User Name</label>

                <div class="col-sm-6">                    
		    			{!! Form::text('name', old('name', isset($user) ? $user->name : null), 
		    													array('class'=>'form-control', 'id'=>'user-name',
		    													'placeholder'=>'Name',
		    													'style'=>'')) !!}
		    			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}									   
                </div>                
            </div>
            
            
 			<div class="form-group">
                <label for="user-email" class="col-sm-3 control-label">E mail</label>
            	<div class="col-sm-6">
                                        
                    {!! Form::text('email', old('email', isset($user) ? $user->email : null), 
		    													array('class'=>'form-control', 'id'=>'user-email',
		    													'placeholder'=>'email',
		    													'style'=>'')) !!}
		    		{!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            
            @can('admin', Auth::user())
            
	            <!-- Abilities -->
	            <div class="form-group">
	                <label for="ability[]" class="col-sm-3 control-label">Abilities</label>
	            	<div class="col-sm-6">
			            @foreach ($abilities as $ability)
						     {{ Form::checkbox('abilities[]', $ability->id,  isset ($selectedAbilities) ? $selectedAbilities->find($ability->id) : null) }}
						     {{ Form::label('ability', $ability->name) }}<br>
						@endforeach
				
					</div>
	            </div>
			
			@endcan