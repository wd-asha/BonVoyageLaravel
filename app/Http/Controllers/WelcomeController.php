<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Departure;
use App\Models\Subscriber;

class WelcomeController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $hotels = Hotel::all();
        $departures = Departure::all();
        $subscribers = Subscriber::all();
        return view('welcome', compact('countries', 'hotels', 'departures', 'subscribers'));
    }
}
