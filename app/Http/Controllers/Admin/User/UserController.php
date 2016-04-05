<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Ability;
use DB;
use Auth;
use Debugbar;

class UserController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display a list of all users.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		
		$this->authorize('admin',  Auth::user());
		
		$users = User::all();
		$abilities = Ability::all();
		$selectedAbilities = null;
		
		return view('users.index', [
	        'users' => $users,
			'abilities' => $abilities,
			'selectedAbilities' => $selectedAbilities
	    ]);
	}
	
	/**
	 * Create a new task.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->authorize('admin',  Auth::user());
		
		$this->validate($request, User::storeRules());		
		
		DB::transaction(function () use ($request){
			$user = User::create(User::storeAttributes($request));
			
			$abilities =[];
			if(!is_null($request->abilities)) $abilities = $request->abilities;
			$user->abilities()->sync($abilities);
		});
		
		
		return redirect(route('user.index'));
	}
	
	/**
	 * Show the given task.
	 *
	 * @param  Request  $request
	 * @param  User  $task
	 * @return Response
	 */
	public function show(Request $request, User $user)
	{
		$this->authorize('edit_user',  Auth::user(), $user);
		
		$selectedAbilities = $user->abilities;
	
		return view('users.show', [
				'user' => $user,				
				'selectedAbilities' => $selectedAbilities
		]);
	}
	
	/**
	 * Edit the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function edit(Request $request, User $user)
	{
		$this->authorize('edit_user',  $request->user(), $user);

		if ($request->user()->can('admin', $request->user())) 
		{
			//Debugbar::info('siiiii');			
			$abilities = Ability::all();
			$selectedAbilities = $user->abilities;			
		}
		else
		{
			//Debugbar::info('nooooo');			
			$abilities = [];
			$selectedAbilities = [];
		}

		return view('users.edit', [
	        	'user' => $user,
				'abilities' => $abilities,
				'selectedAbilities' => $selectedAbilities
	    	]);
	}
	
	/**
	 * Update the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function update(Request $request, User $user)
	{
		$this->authorize('edit_user',  Auth::user(), $user);
		
		$this->validate($request, User::updateRules($user));
		
		DB::transaction(function () use ($request, $user){
			$user->update(User::updateAttributes($request));
				
			if ($request->user()->can('admin', $request->user()))
			{
				$abilities =[];
				if(!is_null($request->abilities)) $abilities = $request->abilities;
				$user->abilities()->sync($abilities);
			}
		});	
		
		return redirect(route('user.edit', $user))->with('success', 'Profile updated!');
	}
	
	/**
	 * Update the password the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function updatePassword(Request $request, User $user)
	{
		$this->authorize('edit_user',  Auth::user(), $user);
		$this->validate($request, User::updatePasswordRules());
		
		DB::transaction(function () use ($request, $user){
			$user->update(User::updatePassword($request));

		});
	
		return redirect(route('user.edit', $user))->with('success', 'Profile updated!');
	}
	
	/**
	 * Destroy the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function destroy(Request $request, User $user)
	{
		//$this->authorize('destroy', $task);
	
		$this->authorize('admin',  Auth::user());
		
		$user->delete();
	
		return redirect(route('user.index'));
	}
}
