<?php

use App\Genre;
use App\Movie;
use GuzzleHttp\Psr7\Request as Request;
use Illuminate\Database\Seeder;
use League\Csv\Reader;
use League\Csv\Statement;

class MoviesTableSeeder extends Seeder
{

    protected $apiUrl;
    protected $apiKey;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->apiUrl = config('urls.api.tmdb.search');
        $this->apiKey = config('keys.api.tmdb');

        $csv = Reader::createFromPath('database/seeds/movies.csv', 'r');
         $records = $csv->getRecords();
        $failedCalls = [];

        $url = $this->apiUrl . 'api_key=' . $this->apiKey . '&language=en-US&page=1&include_adult=false';
        $client = new GuzzleHttp\Client();

        $i = 1;
        foreach ($records as $record) {
            echo "$i\n";

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
            $newUrl = $url . '&query=' . urlencode($title) . '&year=' . $year;

            if ($i % 40 == 0 && $i != 0) {
                sleep(11);
            }

            $request = new Request('GET', $newUrl);
            $promise = $client->sendAsync($request)->then(function ($response) use ($title, $failedCalls) {

                $results = json_decode($response->getBody())->results;

                if (!empty($results)) {
                    $data = $results[0];
                    $existingMovie = Movie::find($data->id);

                    if (!$existingMovie) {
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
                    }

                } else {
                    $failedCalls[] = $title;
                }
            });

            $promise->wait();

            $i++;
        }

        echo $failedCalls;
    }
}
