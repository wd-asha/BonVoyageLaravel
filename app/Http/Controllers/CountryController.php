<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Country;
use App\Models\Hotel;
class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        $hotels = Hotel::all();
        return view('countries', compact('countries', 'hotels'));
    }
}
