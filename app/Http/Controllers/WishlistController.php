<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hotel;
use App\Models\Departure;
/*use App\Models\Subscriber;*/
use App\Models\User;
/*use App\Models\Order;*/
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        /* Actions for auth only */
        /*$this->middleware('auth');*/
    }

    /* ------------------------------------------- */
    /* User's personal account after authorization */
    /* ------------------------------------------- */
    public function index()
    {
        $departures = Departure::all();
        /*$orders = Order::all();*/
        $wishlists = Wishlist::all();
        /* to User's personal account */
        return view('wishlist', compact('wishlists', 'departures'/*, 'orders'*/));
    }

}
