<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    /**
     * mass assignment
     */
    protected $fillable = [
    	'street', 
    	'city', 
    	'zip', 
    	'state', 
    	'country', 
    	'price', 
    	'description'
    ];


	/**
     * A flyer is comprised of many photos.
     */
    public function photos()
    {
    	return $this->hasMany('App\Photo');	
    }

    /**
     * create accessor for the price attribute. 
     */
    public function getPriceAttribute($price)
    {
        return '$' . number_format($price);
    }

    /**
     * dynamic scope to loacte flyer on basis of zip and street.
     */
    public static function locatedAt($zip, $street)
    {   
       $street = str_replace('-', ' ', $street); 
       return static::where(compact('zip', 'street'))->first();
    }


    /**
     * add photo to the relaeationship.
     */
    public function addPhoto(Photo $photo)
    {   
        return $this->photos()->save($photo);
    }


    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


    public function ownedBy(User $user)
    {   
        return $this->user_id == $user->id;
    }
}
