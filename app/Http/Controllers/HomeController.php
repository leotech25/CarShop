<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use App\Models\User;
use Database\Factories\MakerFactory;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    //
    public function index()
    {

        // $cars = Car::with(['city', 'carType', 'fuelType', 'maker', 'model', 'primaryImage'])
        //     ->where('published_at', '<', now())
        //     ->orderBy('published_at', 'desc')
        //     ->limit(30)
        //     ->get();
        $cars = Car::where('published_at', '<', now())
            ->orderBy('published_at', 'desc')
            ->limit(30)
            ->get();


        // dd($cars);

        return view('home.index', ["cars" => $cars]);
    }
}
