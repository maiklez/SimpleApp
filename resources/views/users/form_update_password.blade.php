			<div class="form-group">
                <label for="user-password" class="col-sm-3 control-label">Password</label>
            	<div class="col-sm-6">
                                        
                    {!! Form::password('password', null, array('class'=>'form-control', 'id'=>'user-password',
		    													'placeholder'=>'password',
		    													'style'=>'')) !!}
		    		{!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            
            <div class="form-group">
                <label for="user-rpassword" class="col-sm-3 control-label">Repeat Password</label>
            	<div class="col-sm-6">
                                        
                    {!! Form::password('rpassword', null, array('class'=>'form-control', 'id'=>'user-rpassword',
		    													'placeholder'=>'rpassword',
		    													'style'=>'')) !!}
		    		{!! $errors->first('rpassword', '<span class="help-block">:message</span>') !!}
                </div>
            </div>