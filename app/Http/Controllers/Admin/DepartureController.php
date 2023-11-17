<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Departure;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use App\Filters\HotelFilter;

class DepartureController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* ------------------------- */
    /*    Show all departures    */
    /* ------------------------- */
    public function index()
    {
        $departures = Departure::latest()->paginate(5);
        $trashed = Departure::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        $countries = Country::all();
        $hotels = Hotel::all();
        return view('admin.departure.index', compact('departures', 'hotels', 'countries', 'trashed'));
    }
    /* -- end show all departures -- */

    /* ---------------------------------------- */
    /* Show all departures with filter Country */
    /* ---------------------------------------- */
    public function countriesS(HotelFilter $request){
        $departures = Departure::filter($request)->orderBy('id', 'desc')->paginate(5);
        $countries = Country::all();
        $hotels = Hotel::all();
        $trashed = Departure::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view('admin.departure.index', compact('departures', 'hotels', 'countries', 'trashed'));
    }
    /* end show all departures with filter country */

    /* ---------------------------------------- */
    /* Show all departures with filter Hotel */
    /* ---------------------------------------- */
    public function hotelsS(HotelFilter $request){
        $departures = Departure::filter($request)->orderBy('id', 'desc')->paginate(5);
        $countries = Country::all();
        $hotels = Hotel::all();
        $trashed = Departure::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view('admin.departure.index', compact('departures', 'hotels', 'countries', 'trashed'));
    }
    /* end show all departures with filter hotel */

    /* ---------------------------------------- */
    /* Show all departures with filter status */
    /* ---------------------------------------- */
    public function statusS(HotelFilter $request){
        $departures = Departure::filter($request)->orderBy('id', 'desc')->paginate(5);
        $countries = Country::all();
        $hotels = Hotel::all();
        $trashed = Departure::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        return view('admin.departure.index', compact('departures', 'hotels', 'countries', 'trashed'));
    }
    /* end show all departures with filter category */

    /* ------------------------ */
    /*      Create Departure    */
    /* ------------------------ */
    public function create()
    {
        $departures = Departure::all();
        $countries = Country::all();
        $hotels = Hotel::all();
        return view('admin.departure.create', compact('departures','hotels', 'countries'));
    }
    /* -- end create departure -- */

    /* -------------------------- */
    /*      Save new Departure    */
    /* -------------------------- */
    public function store(Request $request)
    {
        $data = array();
        $data['country_id'] = $request->country_id;
        $data['hotel_id'] = $request->hotel_id;
        $data['departure_departure'] = $request->departure_departure;
        $data['departure_arrival'] = $request->departure_arrival;
        $data['departure_seats'] = $request->departure_seats;
        $data['departure_standard'] = $request->departure_standard;
        $data['departure_days'] = $request->departure_days;
        $data['departure_price'] = $request->departure_price;
        $data['departure_town'] = $request->departure_town;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        Departure::create($data);
        $notification = array(
            'message' => 'Новое предложение создано',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.departures')->with($notification);
    }
    /* -- end save new departure -- */

    /* ------------------- */
    /*  Trashed Departure  */
    /* ------------------- */
    public function delete($id)
    {
        Departure::find($id)->delete();
        $notification = array(
            'message' => 'Предложение в корзине',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end trashed departure */

    /* ------------------------- */
    /*      Restore Departure    */
    /* ------------------------- */
    public function restore($id)
    {
        Departure::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Предложение восстановлено',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -- end restore departure -- */

    /* ------------------------- */
    /*      Destroy Departure    */
    /* ------------------------- */
    public function destroy($id)
    {
        Departure::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Предложение удалено',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -- end destroy departure -- */

    /* ------------------------------- */
    /*      Show single departure      */
    /* ------------------------------- */
    public function show($id)
    {
        $departure = Departure::find($id);
        return view('admin.departure.show', compact('departure'));
    }
    /* -- end show single departure -- */

    /* ---------------------- */
    /*      Edit Departure    */
    /* ---------------------- */
    public function edit($id)
    {
        $departure = Departure::find($id);
        $countries = Country::all();
        $hotels = Hotel::all();
        return view('admin.departure.edit', compact('departure','hotels', 'countries'));
    }
    /* -- end edit departure -- */

    /* -------------------------- */
    /*      Update Departure      */
    /* -------------------------- */
    public function update($id, Request $request)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['country_id'] = $request->country_id;
        $data['hotel_id'] = $request->hotel_id;
        $data['departure_departure'] = $request->departure_departure;
        $data['departure_arrival'] = $request->departure_arrival;
        $data['departure_seats'] = $request->departure_seats;
        $data['departure_standard'] = $request->departure_standard;
        $data['departure_days'] = $request->departure_days;
        $data['departure_price'] = $request->departure_price;
        $data['departure_town'] = $request->departure_town;
        $data['updated_at'] = Carbon::now();
        /* update departure */
        $update = Departure::find($id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Предлождение обновлено',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Нечего обновлять',
                'alert-type' => 'success'
            );
        }
        /* to the departures list page */
        return Redirect()->route('admin.departures')->with($notification);
    }
    /* -- end update departure -- */

    public function fetchState(Request $request)
    {
        $data['hotels'] = Hotel::where("country_id", $request->country_id)
            ->get();
        return response()->json($data);
    }

}
