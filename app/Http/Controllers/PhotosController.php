<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{

	public function index()
	{

		$photos = Photo::latest()
		->filter(request(['month', 'year']))
		->orderBy('created_at')
		->get();

		$archives = Photo::archives();

		return view('photos.index', compact('photos'));
	}

	public function show(Photo $Photo)
	{
		return view('photos.show');
	}

	public function store()
	{
		//example of how to upload a file
		// $myFile = new File('file.txt');
		// $handle = fopen($myFile, 'w') or die('Cannot open file:  '.$myFile);
		// $data = 'Test 2';
		// fwrite($handle, $data); 

		//returns a bool
		// return [Storage::disk('s3')->put('uploads', $myFile, 'public')];
	}
}
