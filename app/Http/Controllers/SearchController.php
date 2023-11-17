<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Departure;
use Illuminate\Http\JsonResponse;
use Illuminate\Pagination\Paginator;
class SearchController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        $countries = Country::all();
        $departures = Departure::latest()->paginate(6);
        $departuresCount = Departure::all()->count();
        return view('search', compact('countries', 'hotels', 'departures', 'departuresCount'));
    }

    public function searchDepart(Request $request)
    {
        $countries = Country::all();
        $hotels = Hotel::all();
        if($request->country_id AND !$request->hotel_id AND !$request->dateIn AND !$request->days AND !$request->men) {
            $countryId = $request->country_id;
            $departuresCount = Departure::all()->where('country_id', 'like', $countryId)->count();
            $departures = Departure::latest()->where('country_id', 'like', $countryId)->paginate(6);
        }elseif($request->hotel_id AND !$request->dateIn AND !$request->days AND !$request->men) {
            $hotelId = $request->hotel_id;
            $departuresCount = Departure::all()->where('hotel_id', 'like', $hotelId)->count();
            $departures = Departure::latest()->where('hotel_id', 'like', $hotelId)->paginate(6);
        }elseif($request->hotel_id AND $request->dateIn AND !$request->days AND !$request->men) {
            $hotelId = $request->hotel_id;
            $dateIn = $request->dateIn;
            $departuresCount = Departure::all()->where('hotel_id', 'like', $hotelId)->where('departure_departure', 'like', $dateIn)->count();
            $departures = Departure::latest()->where('hotel_id', 'like', $hotelId)->where('departure_departure', 'like', $dateIn)->paginate(6);
        }elseif(!$request->country_id AND !$request->hotel_id AND $request->dateIn AND !$request->days AND !$request->men) {
            $dateIn = $request->dateIn;
            $departuresCount = Departure::all()->where('departure_departure', 'like', $dateIn)->count();
            $departures = Departure::latest()->where('departure_departure', 'like', $dateIn)->paginate(6);
        }elseif($request->country_id AND !$request->hotel_id AND $request->dateIn AND !$request->days AND !$request->men) {
            $countryId = $request->country_id;
            $dateIn = $request->dateIn;
            $departuresCount = Departure::all()->where('country_id', 'like', $countryId)->where('departure_departure', 'like', $dateIn)->count();
            $departures = Departure::latest()->where('country_id', 'like', $countryId)->where('departure_departure', 'like', $dateIn)->paginate(6);
        }elseif(!$request->country_id AND !$request->hotel_id AND !$request->dateIn AND $request->days AND !$request->men) {
            $days = $request->days;
            $departuresCount = Departure::all()->where('departure_days', 'like', $days)->count();
            $departures = Departure::latest()->where('departure_days', 'like', $days)->paginate(6);
        }elseif($request->country_id AND !$request->hotel_id AND !$request->dateIn AND $request->days AND !$request->men) {
            $countryId = $request->country_id;
            $days = $request->days;
            $departuresCount = Departure::all()->where('country_id', 'like', $countryId)->where('departure_days', 'like', $days)->count();
            $departures = Departure::latest()->where('country_id', 'like', $countryId)->where('departure_days', 'like', $days)->paginate(6);
        }elseif($request->hotel_id AND !$request->dateIn AND $request->days AND !$request->men) {
            $hotelId = $request->hotel_id;
            $days = $request->days;
            $departuresCount = Departure::all()->where('hotel_id', 'like', $hotelId)->where('departure_days', 'like', $days)->count();
            $departures = Departure::latest()->where('hotel_id', 'like', $hotelId)->where('departure_days', 'like', $days)->paginate(6);
        }elseif(!$request->country_id AND !$request->hotel_id AND $request->dateIn AND $request->days AND !$request->men) {
            $dateIn = $request->dateIn;
            $days = $request->days;
            $departuresCount = Departure::all()->where('departure_departure', 'like', $dateIn)->where('departure_days', 'like', $days)->count();
            $departures = Departure::latest()->where('departure_departure', 'like', $dateIn)->where('departure_days', 'like', $days)->paginate(6);
        }elseif(!$request->country_id AND !$request->hotel_id AND !$request->dateIn AND !$request->days AND $request->men){
            $men = "";
            if($request->men === "1") $men = "двухкомнатный";
            if($request->men === "2") $men = "двухместный";
            if($request->men === "3") $men = "трехкомнатный";
            if($request->men === "4") $men = "четырехместный";
            $departuresCount = Departure::all()->where('departure_seats', 'like', $men)->count();
            $departures = Departure::latest()->where('departure_seats', 'like', $men)->paginate(6);
        }elseif($request->country_id AND !$request->hotel_id AND !$request->dateIn AND !$request->days AND $request->men) {
            $men = "";
            if($request->men === "1") $men = "двухкомнатный";
            if($request->men === "2") $men = "двухместный";
            if($request->men === "3") $men = "трехкомнатный";
            if($request->men === "4") $men = "четырехместный";
            $countryId = $request->country_id;
            $departuresCount = Departure::all()->where('country_id', 'like', $countryId)->where('departure_seats', 'like', $men)->count();
            $departures = Departure::latest()->where('country_id', 'like', $countryId)->where('departure_seats', 'like', $men)->paginate(6);
        }elseif($request->hotel_id AND !$request->dateIn AND !$request->days AND $request->men) {
            $men = "";
            if($request->men === "1") $men = "двухкомнатный";
            if($request->men === "2") $men = "двухместный";
            if($request->men === "3") $men = "трехкомнатный";
            if($request->men === "4") $men = "четырехместный";
            $hotelId = $request->hotel_id;
            $departuresCount = Departure::all()->where('hotel_id', 'like', $hotelId)->where('departure_seats', 'like', $men)->count();
            $departures = Departure::latest()->where('hotel_id', 'like', $hotelId)->where('departure_seats', 'like', $men)->paginate(6);
        }elseif(!$request->country_id AND !$request->hotel_id AND !$request->dateIn AND $request->days AND $request->men) {
            $men = "";
            if($request->men === "1") $men = "двухкомнатный";
            if($request->men === "2") $men = "двухместный";
            if($request->men === "3") $men = "трехкомнатный";
            if($request->men === "4") $men = "четырехместный";
            $days = $request->days_id;
            $departuresCount = Departure::all()->where('departure_days', 'like', $days)->where('departure_seats', 'like', $men)->count();
            $departures = Departure::latest()->where('departure_days', 'like', $days)->where('departure_seats', 'like', $men)->paginate(6);
        }elseif(!$request->country_id AND $request->hotel_id AND !$request->dateIn AND $request->days AND $request->men) {
            $men = "";
            if($request->men === "1") $men = "двухкомнатный";
            if($request->men === "2") $men = "двухместный";
            if($request->men === "3") $men = "трехкомнатный";
            if($request->men === "4") $men = "четырехместный";
            $hotelId = $request->hotel_id;
            $days = $request->days_id;
            $departuresCount = Departure::all()->where('hotel_id', 'like', $hotelId)->where('departure_days', 'like', $days)->where('departure_seats', 'like', $men)->count();
            $departures = Departure::latest()->where('hotel_id', 'like', $hotelId)->where('departure_days', 'like', $days)->where('departure_seats', 'like', $men)->paginate(6);
        }elseif(!$request->country_id AND $request->hotel_id AND !$request->dateIn AND $request->days AND $request->men) {
            $men = "";
            if($request->men === "1") $men = "двухкомнатный";
            if($request->men === "2") $men = "двухместный";
            if($request->men === "3") $men = "трехкомнатный";
            if($request->men === "4") $men = "четырехместный";
            $dateIn = $request->dateIn;
            $days = $request->days_id;
            $departuresCount = Departure::all()->where('departure_departure', 'like', $dateIn)->where('departure_days', 'like', $days)->where('departure_seats', 'like', $men)->count();
            $departures = Departure::latest()->where('departure_departure', 'like', $dateIn)->where('departure_days', 'like', $days)->where('departure_seats', 'like', $men)->paginate(6);
        }else{
            $departures = Departure::latest()->paginate(6);
            $departuresCount = Departure::all()->count();
        }

        return view('search', compact('hotels', 'countries', 'departures', 'departuresCount'));
    }

    public function searchHotel($id)
    {
        $countries = Country::all();
        $departures = Departure::all();
        $hotel = Hotel::find($id);
        return view('hotel', compact('hotel', 'countries', 'departures'));
    }

    public function fetchState(Request $request): JsonResponse
    {
        $data['hotels'] = Hotel::where("country_id", $request->country_id)
            ->get();
        return response()->json($data);
    }
}
