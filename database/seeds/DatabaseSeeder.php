<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moviesGenresSeeder = new MovieGenresTableSeeder();
        $moviesTableSeeder = new MoviesTableSeeder();

        $moviesGenresSeeder->run();
        $moviesTableSeeder->run();
    }
}
