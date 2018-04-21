<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//used to load initial photo urls to the db after uploading them to s3 manually. 
    	//shouldn't need to be used again. 

    	$s3 = Storage::cloud();
    	$photos = [];

    	$photoPaths = $s3->files('images');
    	foreach ($photoPaths as $photoPath) {
    		$photoUrl = $s3->url($photoPath);

    		$photo = [
    			'name' => 'name',
    			'description' => 'description',
    			'url' => $photoUrl
    		];

    		$photos[] = $photo;

    		DB::table('photos')->insert([
    			'name' => $photo['name'],
    			'description' => $photo['description'],
    			'url' => $photo['url']
    		]);
    	}
    }
}