			<!-- New Task Form -->
        
            {!! csrf_field() !!}

            <!-- Task Name -->
            <div class="form-group">
                <label for="ability-name" class="col-sm-3 control-label">Ability Name</label>

                <div class="col-sm-6">                    
		    			{!! Form::text('name', old('name', isset($ability) ? $ability->name : null), 
		    													array('class'=>'form-control', 'id'=>'ability-name',
		    													'placeholder'=>'Name',
		    													'style'=>'')) !!}
		    													
		    			{!! $errors->first('name', '<span class="help-block">:message</span>') !!}								   
                </div>                
            </div>
            
            
 			<div class="form-group">
                <label for="ability-description" class="col-sm-3 control-label">Description</label>
            	<div class="col-sm-6">
                                        
                    {!! Form::text('description', old('description', isset($ability) ? $ability->description : null), 
		    													array('class'=>'form-control', 'id'=>'ability-description',
		    													'placeholder'=>'description',
		    													'style'=>'')) !!}
		    		{!! $errors->first('description', '<span class="help-block">:message</span>') !!}
                </div>
            </div>

            
            
            
