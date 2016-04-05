<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Ability;
use App\Http\Controllers\Admin\ActionModel;
use Illuminate\Http\Request;

class User extends Authenticatable implements ActionModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /**
     * Get all of the tasks for the user.
     */
    public function abilities()
    {
    	return $this->belongsToMany(Ability::class, 'abilities_users');
    }
    
    public static function boot()
    {
    	parent::boot();
    
    	// Attach event handler, on deleting of the user
    	User::deleting(function($user)
    	{
    		$user->abilities()->sync([]);
    	});
    }
    
    public function isSuperAdmin(){    	
    	
    	return $this->abilities()->get()->filter(function($item) {
    		return $item->id == Ability::superUser();
    	})->first();
    }
    
    public function isBlogger(){
    	 
    	return $this->abilities()->get()->filter(function($item) {
    		return $item->name == Ability::$post_blog;
    	})->first();
    }
    
    
    public static function storeRules(){
    	return [
    			'name' => 'required|min:3|max:255',
    			'email' => 'required|email|max:255|unique:users,email',
    			'password' => 'required|min:4|max:255',
    			'rpassword' => 'required|same:password',
    	];
    }
    
 public static function  storeAttributes(Request $request){
    	return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
    }
    
    public static function updateRules(User $user){
    	return [
    			'name' => 'required|min:3|max:255',
    			'email' => 'required|email|max:255|unique:users,email,'.$user->id,
    	];
    }
    
    public static function  updateAttributes(Request $request){
    	return [
    			'name' => $request->name,
    			'email' => $request->email,
    	];
    }
    
    public static function updatePasswordRules(){
    	return [
    			'password' => 'required|min:4|max:255',
    			'rpassword' => 'required|same:password',
    	];
    }
    public static function  updatePassword(Request $request){
    	return [
    			'password' => bcrypt($request->password),
    	];
    }
    
}
