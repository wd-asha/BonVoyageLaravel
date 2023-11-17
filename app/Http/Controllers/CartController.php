<?php

namespace App\Http\Controllers;

use App\Mail\Alerts;
use Illuminate\Http\Request;
use App\Models\Departure;
use Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /* ---------------------------------------- */
    /*       Show shopping cart contents        */
    /* ---------------------------------------- */
    public function index()
    {
        $cartItems = Cart::content();
        $departures = Departure::all();
        $countries = Country::all();
        $hotels = Hotel::all();
        /* to the checkout page (with shopping cart) */
        return view('wishlist', compact('cartItems', 'departures', 'countries', 'hotels'));
    }
    /* ---- end Show shopping cart contents --- */

    /* ----------------------------------------- */
    /*        Add product to shopping cart       */
    /* ----------------------------------------- */
    public function addCart(Request $request, $id)
    {
        $departure = Departure::find($id);

        Cart::add(
          [
              'id' => $departure->id,
              'name' => "none",
              'qty' => 1,
              'price' => $departure->departure_price,
              'weight' => 1,
              'options' => [
                  'image' => $departure->hotel->hotel_image1,
                  'country' => $departure->country->country_title,
                  'town' => $departure->departure_town,
                  'hotel' => $departure->hotel->hotel_title,
                  'departure' => $departure->departure_departure,
                  'arrival' => $departure->departure_arrival,
                  'seats' => $departure->departure_seats,
                  'standard' => $departure->departure_standard,
                  'days' => $departure->departure_days,
              ]
          ]
        );

        Departure::find($id)->update([
            'departure_status' => 1
        ]);

        $notification = array(
            'message' => 'Предложение выбрано',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* -------- end Add product to shopping cart -------- */

    /* --------------------------------------------- */
    /*       Remove an item from shopping cart       */
    /* --------------------------------------------- */
    public function delete($rowId)
    {
        $product = Cart::get($rowId);
        $id = $product->id;

        Departure::find($id)->update([
            'departure_status' => 0
        ]);

        Cart::remove($rowId);
        $notification = array(
            'message' => 'Предложение удалено',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }
    /* --- end Remove an item from shopping cart --- */

    /* --------------------------------- */
    /*          Order formation          */
    /* --------------------------------- */
    public function check(Request $request, $rowId)
    {
        $request->validate([
           'delivery' => 'required',
           'phone' => 'required',
           'dmail' => 'required|email:rfc',
        ],
            [
                'delivery.required' => 'Обязательно для заполнения',
                'phone.required' => 'Обязательно для заполнения',
                'dmail.required' => 'Обязательно для заполнения',
                'dmail.email' => 'Неверный формат email',
            ], []
        );

        /* Prepare data for the order */
        $data = array();
        $data['user_id'] = Auth::id();
        $data['user_name'] = $request->user_name;
        $data['order_email'] = $request->dmail;
        $data['order_delivery'] = $request->delivery;
        $data['order_phone'] = $request->phone;
        $data['order_total'] = strval(Cart::priceTotal());
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        $order_id = Order::insertGetId($data);

        /* Prepare data for a shopping list */
        $details = array();
        $row = Cart::get($rowId);
        $details['order_id'] = $order_id;
        $details['departure_id'] = $row->id;
        $details['departure_departure'] = $row->options->departure;
        $details['departure_arrival'] = $row->options->arrival;
        $details['departure_seats'] = $row->options->seats;
        $details['departure_standard'] = $row->options->standard;
        $details['departure_price'] = $row->price;
        $details['departure_days'] = $row->options->days;
        $details['departure_country'] = $row->options->country;
        $details['departure_town'] = $row->options->town;
        $details['departure_hotel'] = $row->options->hotel;
        $details['created_at'] = Now();
        $details['updated_at'] = Now();
        OrderItem::insert($details);

        /* Notify the buyer about the purchase by email */
        /* preparing data for the letter */
        $name = $data['user_name'];
        $email = $data['order_email'];
        $body = Cart::content();
        $subject = $request->subject;
        $total = Cart::priceTotal();
        $orderid = $order_id;
        /* send a letter */
        if (Auth::check()) {
            Mail::to($email)->send(new Alerts($name, $body, $total, $orderid));
        }
        /* Deleting the contents of the shopping cart */
        Cart::remove($rowId);
        /* return to the user’s personal account */
        $notification = array(
            'message' => 'Заказ принят',
            'alert-type' => 'success'
        );
        /*return Redirect()->to('/wishlist')->with($notification);*/
        return Redirect()->back()->with($notification);
    }
    /* --------------- end Order formation ------------------ */
}
