<?php

namespace App;

Use Image;

class Thumbnail {

	public function make($src, $destination){

		Image::make($src)
			->fit(200)
			->save($destination);

	}


}