<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use Maiklez\MaikBlog\Models\Post;

class UsersPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    
    public function admin($user) {    	 
    	return $user->isSuperAdmin();
    }
    
    public function edit_user(User $the_user, User $editUser) {
    	return $this->admin($the_user)||$the_user->id==$editUser->id;
    }
    
    public function blog(User $the_user) {
    	return $this->admin($the_user)||$the_user->isBlogger();
    }
    
}
