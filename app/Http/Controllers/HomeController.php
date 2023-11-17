<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Departure;
use App\Models\Wishlist;

class HomeController extends Controller
{
    public function __construct()
    {
        /* Actions for auth only */
        $this->middleware('auth');
    }

    /* ------------------------------------------- */
    /* User's personal account after authorization */
    /* ------------------------------------------- */
    /* duplicate AuthorDashboardController */
    public function index()
    {
        $departures = Departure::all();
        /*$orders = Order::all();*/
        $wishlists = Wishlist::all();
        /* to User's personal account */
        return view('wishlist', compact('wishlists', 'departures'/*, 'orders'*/));
    }
}
