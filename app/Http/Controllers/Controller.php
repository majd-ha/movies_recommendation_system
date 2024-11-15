<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Catogery;
use App\Film;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Controller extends BaseController
{
    public function addrate($moviename, $rate)
    {

        $url = 'http://127.0.0.1:5000/get_top5_recommendation';
        $data = [
            'name' => $moviename,
            'rate' => $rate,

        ];


        $response = Http::post($url, $data);


        $recommendations = $response->json();

        $arr = array_keys($recommendations);
        if ($rate == 5) {
            array_shift($arr);
        }

        return $arr;
    }
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
        $Categories = Catogery::all();

        if (auth()->check()) {

            $userdetails = Rating::where('userId', auth()->id())->latest('updated_at')->orderByRaw('updated_at IS NULL, created_at DESC')->first();
            if (is_null($userdetails)) {
                $films = Film::orderBy('movieId')->orderBy('movieId', 'ASC')->filter(request(['search', 'category']))->paginate(30);
            } else {
                $recommendedMovies = $this->addrate($userdetails->title, $userdetails->rating);
                $recommendedMovies = array_reverse($recommendedMovies);
                $films = Film::orderByRaw('FIELD (title , "' . implode('","', $recommendedMovies) . '") DESC')->orderBy('movieId', 'ASC')->filter(request(['search', 'category']))->paginate(30);
            }
        } else {
            $films = Film::orderBy('movieId')->orderBy('movieId', 'ASC')->filter(request(['search', 'category']))->paginate(30);
        }

        $filmslimts = Film::orderBy('movieId', 'DESC')->take(5)->get();
        // dd($recommendedMovies);

        // $films = Film::whereIn('title', $recommendedMovies)->filter(request(['search', 'category']))->paginate(30);

        // dd($films);
        // $films = Film::whereIn('title', $recommendedMovies)->orderBy('movieId', 'ASC')->filter(request(['search', 'category']))->paginate(30);

        return view('welcome', ['filmslimts' => $filmslimts, 'Categories' => $Categories, 'films' => $films]);
    }
    public function getdetails()
    {

        $id = request()->id;
        $movie = Film::find($id);
        $moviename = trim($movie->title);

        $arr = $this->addrate($moviename, 5);
        $result = Film::whereIn('title', $arr)->orderByRaw('FIELD(title, "' . implode('","', $arr) . '") ASC')->limit(6)->get();

        return view('details', ['film' => $movie, 'recommendations' => $result]);
    }

    public function rate()
    {


        $id = request()->id;
        $movie = Film::find($id);
        $rate = intval(request()->rate);
        $moviename = trim($movie->title);



        $userId = auth()->id();
        $rating = Rating::where('movieId', $id)->where('userId', $userId)->first();
        if (is_null($rating)) {
            $rating = new Rating;
            $rating->movieId = $id;
            $rating->title = $moviename;
            $rating->genres = $movie->genres;
            $rating->rating = $rate;

            $rating->userId = auth()->id();
            $rating->save();
        } else {
            $rating = Rating::where('movieId', $id)->where('userId', $userId);


            $rating->update(['rating' => $rate]);
        }


        $arr = $this->addrate($moviename, $rate);
        $result = Film::whereIn('title', $arr)->orderByRaw('FIELD(title, "' . implode('","', $arr) . '") ASC')->limit(6)->get();


        return view('details', ['film' => $movie, 'recommendations' => $result]);
    }
}
