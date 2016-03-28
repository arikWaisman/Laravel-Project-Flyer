<?php

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

function link_to($body, $path, $type){

	$csrf = csrf_field();

	if(is_object($path)){

		$action = '/' . $path->getTable();

		if(in_array($type, ['PUT', 'PATCH', 'DELETE'])){

			$action .= '/'. $path->getKey();

		}

	} else{

		$action = $path;

	}

	return <<<EOT
		<form method="POST" action="{$action}">
			{$csrf}
            <input type="hidden" name="_method" value="{$type}">
            <button type="submit">{$body}</button>
        </form>
EOT;


}