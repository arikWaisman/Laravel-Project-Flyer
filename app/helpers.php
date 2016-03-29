<?php

use App\Http\Utilities\Country;

/**
 * display a flash message
 * @param null $title
 * @param null $message
 * @return \Illuminate\Foundation\Application|mixed
 */
function flash($title = null, $message = null) {

	$flash = app('App\Http\Flash');

	if(func_num_args() == 0){
		return $flash;
	}

	return $flash->info($title, $message);

}

/**
 * Path to a given flyer
 * @param App\Flyer $flyer
 * @return string
 */
function flyer_path(App\Flyer $flyer){

	return $flyer->id.'/'.str_replace(' ', '-', $flyer->item);

}

function link_to_modify($body, $path, $type){

	$csrf = csrf_field();
	$imgURL = url('images/close.png');

	if(is_object($path)){

		$action = '/' . $path->getTable();

		if(in_array($type, ['PUT', 'PATCH', 'DELETE'])){

			$action .= '/'. $path->getKey();

		}

	} else{

		$action = $path;

	}

	return <<<EOT
		<form method="POST" action="{$action}" class="delete-image-form">
			{$csrf}
            <input type="hidden" name="_method" value="{$type}">
            <input type="image" src="{$imgURL}" alt="Delete" class="delete-image">
        </form>
EOT;


}

function countries_select_loop($countries ){

	foreach($countries::all() as $country => $code) {
		return "<option value='{$code}'>{$country}</option>";
    }

}