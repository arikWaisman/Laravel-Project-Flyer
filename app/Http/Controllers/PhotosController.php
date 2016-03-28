<?php

namespace App\Http\Controllers;

use App\AddPhotoToFlyer;

use App\Flyer;

use App\Photo;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\AddPhotoRequest;


class PhotosController extends Controller
{

	/**
	 * Apply a photo to the referenced flyer
	 * @param $id
	 * @param $item
	 * @param AddPhotoRequest $request
	 */
	public function store($id, $item, AddPhotoRequest $request){

		$flyer = Flyer::whereIdAndItemAre($id, $item);

		$photo = $request->file('photo');

		(new AddPhotoToFlyer($flyer, $photo))->save();

	}

	public function destroy($id){

		Photo::findOrFail($id)->delete();

		return back();

	}

}
