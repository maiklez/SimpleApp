<?php

namespace App\Http\Controllers\Admin\Ability;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Ability;

use Auth;

class AbilityController extends Controller
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
	 * Display a list of all abilities.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
		$this->authorize('admin',  Auth::user());
		
		$abilities = Ability::all();
		
		
		return view('abilities.index', [
	        'abilities' => $abilities,
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
		
		$this->validate($request, Ability::storeRules());
		
		Ability::create(Ability::storeAttributes($request));
		
		return redirect(route('ability.index'));
	}
	
	/**
	 * Edit the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function edit(Request $request, Ability $ability)
	{
		$this->authorize('admin',  Auth::user());
		
		//ability = Ability::find($ability);
		
		return view('abilities.edit', [
	        'ability' => $ability,
	    ]);
	}
	
	/**
	 * Update the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function update(Request $request, Ability $ability)
	{
		$this->authorize('admin',  Auth::user());
	
		$ability->update(Ability::storeAttributes($request));
		
		return redirect(route('ability.edit', $ability))->with('success', 'Profile updated!');
	}
	
	/**
	 * Destroy the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function destroy(Request $request, Ability $ability)
	{
		$this->authorize('admin',  Auth::user());
	
		$ability->delete();
	
		return redirect(route('ability'));
	}
}
