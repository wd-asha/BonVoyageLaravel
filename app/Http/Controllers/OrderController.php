<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departure;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /* ---------------------------------------- */
    /*       Show shopping cart contents        */
    /* ---------------------------------------- */
    public function checkout()
    {
        $cartItems = Cart::content();
        $departures = Departure::all();
        $countries = Country::all();
        $hotels = Hotel::all();
        /* to the checkout page (with shopping cart) */
        return view('wishlist', compact('cartItems', 'departures', 'countries', 'hotels'));
    }
    /* ---- end Show shopping cart contents --- */
}
