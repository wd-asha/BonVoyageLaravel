<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    public function __construct()
    {
        /* actions for admin only */
        $this->middleware('admin');
    }

    /* ------------------------- */
    /*    Show all countries    */
    /* ------------------------- */
    public function index()
    {
        $countries = Country::latest()->paginate(5);
        /* to the countries list page */
        return view('admin.country.index', compact('countries'));
    }
    /*  end show all countries  */

    /* ---------------------------------- */
    /*          Create new country       */
    /* ---------------------------------- */
    public function store(Request $request)
    {
        /* validation input data */
        $data = $request->validate([
            'country_title' => 'required|unique:countries|min:3',
            'brand_logo' => 'required'
        ],
            [
                'brand_logo.required' => 'Ошибка: Фото обязательно',
                'country_title.required' => 'Ошибка: Наименование обязательно для заполнения',
                'country_title.unique' => 'Ошибка: Токое наименование уже есть',
                'country_title.min' => 'Ошибка: Наименование меньше 3 символов'
            ]);
        /* preparing the data that came from the form */
        $brand_image = $request->file('brand_logo');
        $location = 'media/countries/';
        $name_image = hexdec(uniqid());
        $ext_image = strtolower($brand_image->getClientOriginalExtension());
        $full_image = $location.$name_image.'.'.$ext_image;
        $brand_image->move($location, $full_image);

        /* create country */
        Country::create([
            'country_title' => $request->country_title,
            'country_image' => $full_image,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        /* to page with list countries */
        $notification = array(
            'message' => 'Страна создана',
            'alert-type' => 'info'
        );
        /* to the countries list page */
        return Redirect()->back()->with($notification);
    }
    /* ----- end create new country ----- */

    /* ------------------------------ */
    /*          Delete country      */
    /* ------------------------------ */
    public function delete($id)
    {
        Country::find($id)->forceDelete();
        $notification = array(
            'message' => 'Страна удалена',
            'alert-type' => 'info'
        );
        /* to the countries list page */
        return Redirect()->back()->with($notification);
    }
    /* ---- end delete country ----- */

}
