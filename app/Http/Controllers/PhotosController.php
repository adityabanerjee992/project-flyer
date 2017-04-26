<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Flyer;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Flyers\AddPhotoToFlyer;
use App\Http\Requests\CheckFlyerRequest;

class PhotosController extends Controller
{	
	
	public function store($zip, $street, CheckFlyerRequest $request)
    {   
    	$flyer = Flyer::locatedAt($zip, $street);
        $photo = $request->file('file'); 
        (new AddPhotoToFlyer($flyer, $photo))->save();
    }

}
