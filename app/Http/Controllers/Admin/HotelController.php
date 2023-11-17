<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* --------------------- */
    /*    Show all hotels    */
    /* --------------------- */
    public function index()
    {
        $hotels = Hotel::latest()->paginate(5);
        $trashed = Hotel::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        $countries = Country::all();
        /* to the hotels list page */
        return view('admin.hotel.index', compact('hotels', 'countries', 'trashed'));
    }
    /* -- end show all hotels -- */

    /* -------------------- */
    /*      Create Hotel    */
    /* -------------------- */
    public function create()
    {
        $countries = Country::all();
        /* to the create new hotel page */
        return view('admin.hotel.create', compact('countries'));
    }
    /* -- end create hotel -- */

    /* -------------------------- */
    /*      Save new Departure    */
    /* -------------------------- */
    public function store(Request $request)
    {
        /* preparing data for saving */
        $data = array();
        $data['country_id'] = $request->country_id;
        $data['hotel_town'] = $request->hotel_town;
        $data['hotel_title'] = $request->hotel_title;
        $data['hotel_stars'] = $request->hotel_stars;
        $data['hotel_rooms'] = $request->hotel_rooms;
        $data['hotel_price'] = $request->hotel_price;
        $data['hotel_place'] = $request->hotel_place;
        $data['hotel_tours'] = $request->hotel_tours;
        $data['hotel_about'] = $request->hotel_about;
        $image1 = $request->hotel_image1;
        $image2 = $request->hotel_image2;
        $image3 = $request->hotel_image3;
        $image4 = $request->hotel_image4;
        if ($image1) {
            $image1_name = hexdec(uniqid()) . '.' . $image1->getClientOriginalExtension();
            Image::make($image1)->save('media/hotels/' . $image1_name);
            $data['hotel_image1'] = 'media/hotels/' . $image1_name;
        }
        if ($image2) {
            $image2_name = hexdec(uniqid()) . '.' . $image2->getClientOriginalExtension();
            Image::make($image2)->save('media/hotels/' . $image2_name);
            $data['hotel_image2'] = 'media/hotels/' . $image2_name;
        }
        if ($image3) {
            $image3_name = hexdec(uniqid()) . '.' . $image3->getClientOriginalExtension();
            Image::make($image3)->save('media/hotels/' . $image3_name);
            $data['hotel_image3'] = 'media/hotels/' . $image3_name;
        }
        if ($image4) {
            $image4_name = hexdec(uniqid()) . '.' . $image4->getClientOriginalExtension();
            Image::make($image4)->save('media/hotels/' . $image4_name);
            $data['hotel_image4'] = 'media/hotels/' . $image4_name;
        }
        /* create new hotel */
        Hotel::create($data);
        $notification = array(
            'message' => 'Новый отель создан',
            'alert-type' => 'success'
        );
        /* to the hotels list page */
        return Redirect()->route('admin.hotels')->with($notification);
    }

    /* ----------------- */
    /*  Trashed hotel  */
    /* ----------------- */
    public function delete($id)
    {
        Hotel::find($id)->delete();
        $notification = array(
            'message' => 'Отель в корзине',
            'alert-type' => 'success'
        );
        /* to the hotels list page */
        return Redirect()->back()->with($notification);
    }
    /* end trashed hotel */

    /* ------------------------- */
    /*      Restore hotel      */
    /* ------------------------- */
    public function restore($id)
    {
        Hotel::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Отель восстановлен',
            'alert-type' => 'success'
        );
        /* to the hotels list page */
        return Redirect()->back()->with($notification);
    }
    /* -- end restore hotel -- */

    /* --------------------- */
    /*      Destroy Hotel    */
    /* --------------------- */
    public function destroy($id)
    {
        /* find a hotel */
        $hotel = Hotel::onlyTrashed()->find($id);
        /* delete photos if they exist */
        if($hotel->hotel_image1 !== NULL) {
            $image1 = $hotel->product_image1;
            unlink($image1);
        }
        if($hotel->hotel_image2 !== NULL) {
            $image2 = $hotel->product_image2;
            unlink($image2);
        }
        if($hotel->hotel_image3 !== NULL) {
            $image3 = $hotel->product_image3;
            unlink($image3);
        }
        if($hotel->hotel_image4 !== NULL) {
            $image4 = $hotel->product_image4;
            unlink($image4);
        }
        /* delete a hotel */
        Hotel::onlyTrashed()->find($id)->forceDelete();
        $notification = array(
            'message' => 'Отель удален',
            'alert-type' => 'success'
        );
        /* to the hotels list page */
        return Redirect()->back()->with($notification);
    }
    /* -- end destroy hotel -- */

    /* --------------------------- */
    /*      Show single Hotel      */
    /* --------------------------- */
    public function show($id)
    {
        $countries = Country::all();
        $hotel = Hotel::find($id);
        /* to the hotel`s show page */
        return view('admin.hotel.show', compact('countries', 'hotel'));
    }
    /* -- end show single hotel -- */

    /* ------------------ */
    /*      Edit Hotel    */
    /* ------------------ */
    public function edit($id)
    {
        $countries = Country::all();
        $hotel = Hotel::find($id);
        /* to the hotel`s edit page */
        return view('admin.hotel.edit', compact('countries', 'hotel'));
    }
    /* -- end edit hotel -- */

    /* ------------------------------- */
    /*      Update Hotel Images      */
    /* ------------------------------- */
    public function updatePhoto(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $old_image1 = $request->old_image1;
        $old_image2 = $request->old_image2;
        $old_image3 = $request->old_image3;
        $old_image4 = $request->old_image4;
        $image1 = $request->file('image1');
        $image2 = $request->file('image2');
        $image3 = $request->file('image3');
        $image4 = $request->file('image4');
        $data = array();
        if($image1) {
            /* delete the previous image if there was one */
            if($old_image1 !== 'media/product/empty-image.png') {
                unlink($old_image1);
            };
            /* prepare and save a new image */
            $image1 = $request->file('image1');
            $location = 'media/product/';
            $name_image1 = hexdec(uniqid());
            $ext_image = strtolower($image1->getClientOriginalExtension());
            $full_image = $location.$name_image1.'.'.$ext_image;
            $image1->move($location, $full_image);
            $data['hotel_image1'] = $full_image;
            /* updating hotel */
            Hotel::find($id)->update($data);
            $notification = array(
                'message' => 'Изображение обновлено',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Изображение не обновлено',
                'alert-type' => 'error'
            );
        }
        if($image2) {
            /* delete the previous image if there was one */
            if($old_image2 !== 'media/product/empty-image.png') {
                unlink($old_image2);
            };
            /* prepare and save a new image */
            $image2 = $request->file('image2');
            $location = 'media/product/';
            $name_image2 = hexdec(uniqid());
            $ext_image = strtolower($image2->getClientOriginalExtension());
            $full_image = $location.$name_image2.'.'.$ext_image;
            $image2->move($location, $full_image);
            $data['hotel_image2'] = $full_image;
            /* updating hotel */
            Hotel::find($id)->update($data);
            $notification = array(
                'message' => 'Изображение обновлено',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Изображение не обновлено',
                'alert-type' => 'error'
            );
        }
        if($image3) {
            /* delete the previous image if there was one */
            if($old_image3 !== 'media/product/empty-image.png') {
                unlink($old_image3);
            };
            /* prepare and save a new image */
            $image3 = $request->file('image3');
            $location = 'media/product/';
            $name_image3 = hexdec(uniqid());
            $ext_image = strtolower($image3->getClientOriginalExtension());
            $full_image = $location.$name_image3.'.'.$ext_image;
            $image3->move($location, $full_image);
            $data['hotel_image3'] = $full_image;
            /* updating hotel */
            Hotel::find($id)->update($data);
            $notification = array(
                'message' => 'Изображение обновлено',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Изображение не обновлено',
                'alert-type' => 'error'
            );
        }
        if($image4) {
            /* delete the previous image if there was one */
            if($old_image4 !== 'media/product/empty-image.png') {
                unlink($old_image4);
            };
            /* prepare and save a new image */
            $image4 = $request->file('image4');
            $location = 'media/product/';
            $name_image4 = hexdec(uniqid());
            $ext_image = strtolower($image4->getClientOriginalExtension());
            $full_image = $location.$name_image4.'.'.$ext_image;
            $image4->move($location, $full_image);
            $data['hotel_image4'] = $full_image;
            /* updating hotel */
            Hotel::find($id)->update($data);
            $notification = array(
                'message' => 'Изображение обновлено',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Изображение не обновлено',
                'alert-type' => 'error'
            );
        }
        /* to the hotels list page */
        return Redirect()->route('admin.hotels')->with($notification);
    }
    /* ---- end update hotel images ---- */

    /* ---------------------- */
    /*      Update Hotel      */
    /* ---------------------- */
    public function update(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['country_id'] = $request->country_id;
        $data['hotel_town'] = $request->hotel_town;
        $data['hotel_title'] = $request->hotel_title;
        $data['hotel_stars'] = $request->hotel_stars;
        $data['hotel_rooms'] = $request->hotel_rooms;
        $data['hotel_price'] = $request->hotel_price;
        $data['hotel_place'] = $request->hotel_place;
        $data['hotel_tours'] = $request->hotel_tours;
        $data['hotel_about'] = $request->hotel_about;
        /* update hotel */
        $update = Hotel::find($id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Отель обновлен',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Нечего обновлять',
                'alert-type' => 'success'
            );
        }
        /* to the hotels list page */
        return Redirect()->route('admin.hotels')->with($notification);
    }
    /* -- end update hotel -- */

}
