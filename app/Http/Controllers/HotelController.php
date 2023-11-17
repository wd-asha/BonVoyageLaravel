<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Departure;

class HotelController extends Controller
{
    public function index($country_id)
    {
        $hotels = Hotel::all()->where('country_id', 'like', $country_id);
        $country = Country::find($country_id);
        return view('hotels', compact('hotels', 'country'));
    }

    public function hotel($id)
    {
        $hotel = Hotel::find($id);
        $country = Country::find($id);
        $departures = Departure::all()->where('hotel_id', 'like', $id);
        return view ('hotel', compact('country', 'hotel', 'departures'));
    }

    public function status0($id)
    {
        Departure::find($id)->update([
            'departure_status' => 0
        ]);

        return Redirect()->back();
    }

    public function status1($id)
    {
        Departure::find($id)->update([
            'departure_status' => 1
        ]);

        return Redirect()->back();
    }


}
