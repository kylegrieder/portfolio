<?php

use App\Genre;
use App\Movie;
use Illuminate\Database\Seeder;
use GuzzleHttp\Psr7\Request as Request;
use League\Csv\Reader;
use League\Csv\Statement;

class MoviesTableSeeder extends Seeder
{

    protected $apiUrl = config('urls.api.tmdb.search');
    protected $apiKey = config('keys.api.tmdb');
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath('database/seeds/movies.csv', 'r');
        $records = (new Statement())->limit(10)->process($csv); // TODO: remove this
        // $records = $csv->getRecords();

        $url = $this->apiUrl . 'api_key=' . $this->apiKey . '&language=en-US&page=1&include_adult=false';
        $client = new GuzzleHttp\Client();

        $i = 0;
        foreach ($records as $record) {
            $entry = '';
            if (sizeof($record) > 1) {
                foreach ($record as $piece) {
                    $entry = $entry . $piece;
                }
            } else {
                $entry = $record[0];
            }
            $movie = explode('(', $entry);
            $title = trim(str_replace('_', ':', $movie[0]));
            $year = str_replace(')', '', $movie[1]);
            $url = $url . '&query=' . urlencode($title) . '&year=' . $year;

            $request = new Request('GET', $url);
            $promise = $client->sendAsync($request)->then(function ($response) {

                $data = json_decode($response->getBody())->results[0];
                $movie = new Movie();

                $movie->id = $data->id;
                $movie->title = $data->title;
                $movie->year = explode('-', $data->release_date)[0];
                $movie->overview = $data->overview;
                $movie->poster_path = $data->poster_path;
                $movie->release_date = $data->release_date;

                $movie->save();

                foreach ($data->genre_ids as $movieDbGenre) {
                    $genre = Genre::find($movieDbGenre);
                    $movie = Movie::find($data->id);

                    $movie->genres()->attach($genre->id);
                }

            });

            $promise->wait();

            $i++;
            echo $i;
            if ($i % 40 == 0) {
                sleep(11);
            }
        }
    }
}
