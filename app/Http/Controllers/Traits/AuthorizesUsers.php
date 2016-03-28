<?php

namespace App\Http\Controllers\Traits;

use App\Flyer;
use Illuminate\Http\Request;

trait AuthorizesUsers{

	public function userCreatedFlyer(Request $request){

		return Flyer::where([
			'id'        => $request->id,
			'item'      => $request->item,
			'user_id'   => $this->user->id
		])->exists();

	}

	protected function unauthorized($request){

		if($request->ajax()){
			return response (['message' => 'No way.'], 403);
		}

		flash('No way.');

		return redirect('/');

	}

}