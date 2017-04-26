<?php

class utilities 
{

	public static function fromFile(UploadedFile $file)
    {
        $photo = new static;

        $photo->file = $file;

        return $photo->fill([
            'name'          => $photo->fileName(),
            'path'          => $photo->filePath(),
            'thumbnail_path' => $photo->thumbnailPath()
        ]);
        
    }

	public function fileName()
    {
        $name = sha1(time() . $this->file->getClientOriginalName());

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
    }

	
	public function filePath()
    {
        return static::$baseDir.'/'.$this->fileName();
    }

	
	public function thumbnailPath()
    {
        return static::$baseDir.'/tn-'.$this->fileName();
    }


 	protected static function boot()
    {
        static::creating(function($photo) {
            return $photo->upload();
        });
    }


    public function saveAs($name)
    {   
        $this->name = sprintf('%s-%s', time(), $name);
        $this->path = sprintf('%s/%s', static::$baseDir, $this->name);
        $this->thumbnail_path = sprintf('%stn-%s', static::$baseDir, $name);

        return $this;
    }


    public function makeThumbnail()
    {         
      Image::make($this->filePath())
      ->fit(200)
      ->save($this->thumbnailPath());
    }


    public static function fromForm(UploadedFile $file)
    {   
        return (new static)->saveAs($file->getClientOriginalName());
    }


 	/**
     * move the photo and store.
     */
    public function upload()
    {   
        $this->file->move(static::$baseDir, $this->fileName());

        $this->makeThumbnail();

        return $this;
    }

	// $photo = Photo::fromFile($request->file('file')); 
	// Flyer::locatedAt($zip, $street)->addPhoto($photo);
}