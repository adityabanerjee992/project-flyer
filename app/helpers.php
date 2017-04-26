<?php

function flash($title = null, $message = null)
{
	$flash = app('App\Http\Flash');
	if(func_num_args() == 0) {
		return $flash;
	}
	return $flash->info($title, $message);
}

/**
 * path to a given flyer.
 */
function flyer_path(App\Flyer $flyer)
{
	return $flyer->zip.'/'.str_replace(' ', '-', $flyer->street);
}
