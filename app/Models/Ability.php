<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Http\Controllers\Admin\Validation;
use App\Http\Controllers\Admin\ActionModel;
use Illuminate\Http\Request;

class Ability extends Model implements ActionModel
{	
	protected $table="abilities";
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];
    
    public static $post_blog = "post_blog";
    public static $master = "admin_master";
    /**
     * Get all of the tasks for the user.
     */
    public function users()
    {
    	return $this->belongsToMany(User::class, 'abilities_users');
    }
    
    public static function superUser(){
    	//\Debugbar::info(Ability::where('name', 'admin_master')->first()->id);
    	
    	return Ability::where('name', Ability::$master)->first()->id;
    }
    
    public static function  storeRules(){
    	return [
				'name' => 'required|max:255',
		];
    }
    
    public static function  storeAttributes(Request $request){
    	return [
				'name' => $request->name,
				'description' => $request->description,
		];
    }
}
