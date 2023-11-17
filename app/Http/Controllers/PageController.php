<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Departure;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function team()
    {
        return view('team');
    }

    public function covid()
    {
        return view('covid');
    }

    public function contacts()
    {
        return view('contacts');
    }
}
