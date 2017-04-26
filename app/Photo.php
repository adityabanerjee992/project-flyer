<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Image;

class Photo extends Model
{	
    /**
     * table ehich has to be refrenced.
     */
	protected $table = 'flyer_photos';


    /**
     * directory in which photo will get uploaded.
     */
    protected static $baseDir = 'flyer/photos';


    protected $file;
    
    /**
	 * mass assignment
	 */
    protected $fillable = ['flyer_id', 'path', 'name', 'thumbnail_path'];


    public function setNameAttribute($name)
    {   
        $this->attributes['name'] = $name;
        $this->path = static::$baseDir.'/'.$name;
        $this->thumbnail_path = static::$baseDir.'/tn-'.$name;
    }


	  /**
     * a photo belongs to a flyer
     */
    public function flyer()
    {
    	return $this->belongsTo('App\Flyer');
    }

}
