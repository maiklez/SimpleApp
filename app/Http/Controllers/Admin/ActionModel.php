<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

interface ActionModel {
	
	
	public static function storeRules();
	
	public static function storeAttributes(Request $request);
}