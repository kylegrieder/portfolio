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

		$myFile = new File('file.txt');
		$handle = fopen($myFile, 'w') or die('Cannot open file:  '.$myFile);
		$data = 'Test 2';
		fwrite($handle, $data);

		return [Storage::disk('s3')->put('uploads', $myFile, 'public')];

		return view('photos.index');
	}

	public function show(Photo $Photo)
	{
		return view('photos.show');
	}
}
