<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('photos')->insert([
            ['id' => 1,'name' => 'karsen1','description' => 'Karsen dressed as a bum for Halloween.','url' => 'https://s3.us-west-2.amazonaws.com/net.kyleg.portfolio/images/IMG_0115.jpg','orientation' => 'portrait','created_at' => '2018-04-20 10:13:48', 'updated_at' => NULL],
            ['id' => 2,'name' => 'kenlee1','description' => 'Kenlee wearing a silly trasnformers mask. ','url' => 'https://s3.us-west-2.amazonaws.com/net.kyleg.portfolio/images/IMG_0230.jpg','orientation' => 'portrait','created_at' => '2018-04-20 10:14:19', 'updated_at' => NULL],
            ['id' => 3,'name' => 'karsen_karli1','description' => 'Just Karsen and Karli smiling.','url' => 'https://s3.us-west-2.amazonaws.com/net.kyleg.portfolio/images/IMG_0267.jpg','orientation' => 'portrait','created_at' => '2018-04-20 10:14:59', 'updated_at' => NULL],
            ['id' => 4,'name' => 'kenlee2','description' => 'Kenlee as a baby, one of my favorite pictures of her. ','url' => 'https://s3.us-west-2.amazonaws.com/net.kyleg.portfolio/images/IMG_0338.jpg','orientation' => 'portrait','created_at' => '2018-04-20 10:15:35', 'updated_at' => NULL],
            ['id' => 5,'name' => 'karsen_kenlee1','description' => 'Karsen and Kenlee helping mom shopping at the grocery store. ','url' => 'https://s3.us-west-2.amazonaws.com/net.kyleg.portfolio/images/IMG_0383.jpg','orientation' => 'portrait','created_at' => '2018-04-20 12:51:51', 'updated_at' => NULL],
            ['id' => 6,'name' => 'kenlee3','description' => 'Kenlee, looking too cute to handle. She\'s going to be big trouble when she\'s older.','url' => 'https://s3.us-west-2.amazonaws.com/net.kyleg.portfolio/images/IMG_0493.jpg','orientation' => 'portrait','created_at' => '2018-04-20 10:16:51', 'updated_at' => NULL],
            ['id' => 7,'name' => 'karsen_kenlee2','description' => 'Karsen and Kenlee just hanging out on Easter in 2017. ','url' => 'https://s3.us-west-2.amazonaws.com/net.kyleg.portfolio/images/IMG_0520.jpg','orientation' => 'landscape','created_at' => '2018-04-20 10:17:59', 'updated_at' => NULL],
            ['id' => 8,'name' => 'kenlee_karli1','description' => 'Kenlee and Karli. ','url' => 'https://s3.us-west-2.amazonaws.com/net.kyleg.portfolio/images/IMG_0571.jpg','orientation' => 'portrait','created_at' => '2018-04-20 10:18:35', 'updated_at' => NULL],
            ['id' => 9,'name' => 'karli1','description' => 'My wife stealing my phone to take a goofy selfie','url' => 'https://s3.us-west-2.amazonaws.com/net.kyleg.portfolio/images/IMG_0786.jpg','orientation' => 'portrait','created_at' => '2018-04-20 10:19:29', 'updated_at' => NULL]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('photos')->truncate();
    }
}
