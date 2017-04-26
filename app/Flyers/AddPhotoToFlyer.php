<?php

namespace App\Flyers;

use App\Flyer;
use App\Photo;
use App\Thumbnail;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPhotoToFlyer
{
	protected $flyer;

	protected $file;	

    protected static $baseDir = 'flyer/photos';

	public function __construct(Flyer $flyer, UploadedFile $file, Thumbnail $thumbnail = null)
	{
		$this->flyer = $flyer;
		$this->file = $file;
		$this->thumbnail = $thumbnail ?: new Thumbnail;
	}

	public function save()
	{	
		$photo = $this->flyer->addPhoto($this->makePhoto());

		$this->file->move(static::$baseDir, $photo->name);

		$this->thumbnail->make($photo->path, $photo->thumbnail_path);
	}

	protected function makePhoto()
	{
		return new Photo(['name' => $this->makeFileName()]);
	}

	protected function makeFileName()
	{
		$name = sha1(time() . $this->file->getClientOriginalName());

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
	}
}