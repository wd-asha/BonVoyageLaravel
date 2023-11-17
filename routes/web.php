<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', ['App\Http\Controllers\WelcomeController', 'index'])->name('welcome');

Route::get('password/reset/form', ['App\Http\Controllers\Auth\PasswordResetController', 'showForm'])->name('password.reset.form');
Route::post('reset/password', ['App\Http\Controllers\Auth\PasswordResetController', 'store'])->name('reset.password');

Route::get('forgot-password', ['App\Http\Controllers\Auth\ForgotPasswordController', 'create'])->name('password.reque');
Route::post('forgot-password', ['App\Http\Controllers\Auth\ForgotPasswordController', 'store'])->name('password.email');
Route::get('/password/reset/{token}', ['App\Http\Controllers\Auth\ResetPasswordController', 'create'])->name('password.reset');

//Wishlist
Route::get('wishlist', ['App\Http\Controllers\CartController', 'index'])->name('wishlist');
Route::post('wishlist', ['App\Http\Controllers\CartController', 'send'])->name('send');
Route::get('checkout', ['App\Http\Controllers\OrderController', 'checkout'])->name('checkout');

Route::get('about', ['App\Http\Controllers\PageController', 'about'])->name('about');
Route::get('team', ['App\Http\Controllers\PageController', 'team'])->name('team');
Route::get('covid', ['App\Http\Controllers\PageController', 'covid'])->name('covid');
Route::get('contacts', ['App\Http\Controllers\PageController', 'contacts'])->name('contacts');
Route::get('/home', ['App\Http\Controllers\HomeController', 'index'])->name('home');
Route::get('countries', ['App\Http\Controllers\CountryController', 'index'])->name('countries');
Route::get('hotels/{country_id}', ['App\Http\Controllers\HotelController', 'index'])->name('hotels');
Route::get('hotel/{id}', ['App\Http\Controllers\HotelController', 'hotel'])->name('hotel');
Route::get('departure/status0/{id}', ['App\Http\Controllers\HotelController', 'status0'])->name('departure.status0');
Route::get('departure/status1/{id}', ['App\Http\Controllers\HotelController', 'status1'])->name('departure.status1');

Route::group(['middleware' => ['auth', 'admin']], function(){
    Route::get('admin/index', ['App\Http\Controllers\Admin\AdminDashboardController', 'index'])->name('admin.index');
    Route::get('user/destroy/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'destroyUser'])->name('destroy.user');
    Route::get('user/restore/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'restoreUser'])->name('restore.user');
    Route::get('user/delete/{id}', ['App\Http\Controllers\Admin\AdminDashboardController', 'deleteUser'])->name('delete.user');
});
Route::group(['middleware' => ['auth', 'author']], function(){
    Route::get('author/index', ['App\Http\Controllers\Author\AuthorDashboardController', 'index'])->name('author.index');
});

Route::post('user/personal/update', ['App\Http\Controllers\UserController', 'personal'])->name('personal.update');
Route::post('user/shipping/update', ['App\Http\Controllers\UserController', 'shipping'])->name('shipping.update');

//Admin Country
Route::get('admin/countries', ['App\Http\Controllers\Admin\CountryController', 'index'])->name('admin.countries');
Route::post('admin/country/store', ['App\Http\Controllers\Admin\CountryController', 'store'])->name('admin.country.store');
Route::get('admin/country/delete/{id}', ['App\Http\Controllers\Admin\CountryController', 'delete'])->name('admin.country.delete');

//Admin Hotel
Route::get('admin/hotels', ['App\Http\Controllers\Admin\HotelController', 'index'])->name('admin.hotels');
Route::get('admin/hotel/create', ['App\Http\Controllers\Admin\HotelController', 'create'])->name('hotel.create');
Route::post('admin/hotel/store', ['App\Http\Controllers\Admin\HotelController', 'store'])->name('hotel.store');
Route::post('admin/hotel/update/{id}', ['App\Http\Controllers\Admin\HotelController', 'update'])->name('hotel.update');
Route::get('admin/hotel/show/{id}', ['App\Http\Controllers\Admin\HotelController', 'show'])->name('hotel.show');
Route::get('admin/hotel/edit/{id}', ['App\Http\Controllers\Admin\HotelController', 'edit'])->name('hotel.edit');
Route::get('admin/hotel/delete/{id}', ['App\Http\Controllers\Admin\HotelController', 'delete'])->name('hotel.delete');
Route::get('admin/hotel/restore/{id}', ['App\Http\Controllers\Admin\HotelController', 'restore'])->name('hotel.restore');
Route::get('admin/hotel/destroy/{id}', ['App\Http\Controllers\Admin\HotelController', 'destroy'])->name('hotel.destroy');
Route::post('admin/hotel/updatePhoto/{id}', ['App\Http\Controllers\Admin\HotelController', 'updatePhoto'])->name('admin.hotel.updatePhoto');

//Admin Departure
Route::get('admin/departures', ['App\Http\Controllers\Admin\DepartureController', 'index'])->name('admin.departures');
Route::get('admin/departure/create', ['App\Http\Controllers\Admin\DepartureController', 'create'])->name('departure.create');
Route::post('admin/departure/store', ['App\Http\Controllers\Admin\DepartureController', 'store'])->name('departure.store');
Route::post('admin/departure/update/{id}', ['App\Http\Controllers\Admin\DepartureController', 'update'])->name('departure.update');
Route::get('admin/departure/show/{id}', ['App\Http\Controllers\Admin\DepartureController', 'show'])->name('departure.show');
Route::get('admin/departure/edit/{id}', ['App\Http\Controllers\Admin\DepartureController', 'edit'])->name('departure.edit');
Route::get('admin/departure/delete/{id}', ['App\Http\Controllers\Admin\DepartureController', 'delete'])->name('departure.delete');
Route::get('admin/departure/restore/{id}', ['App\Http\Controllers\Admin\DepartureController', 'restore'])->name('departure.restore');
Route::get('admin/departure/destroy/{id}', ['App\Http\Controllers\Admin\DepartureController', 'destroy'])->name('departure.destroy');
Route::get('admin/hotelsS', ['App\Http\Controllers\Admin\DepartureController', 'hotelsS'])->name('admin.hotelsS');
Route::get('admin/statusS', ['App\Http\Controllers\Admin\DepartureController', 'statusS'])->name('admin.statusS');
Route::get('admin/countriesS', ['App\Http\Controllers\Admin\DepartureController', 'countriesS'])->name('admin.countriesS');

//Cart
Route::post('departure/addCart/{id}', ['App\Http\Controllers\CartController', 'addCart'])->name('departure.addCart');
Route::get('cart', ['App\Http\Controllers\CartController', 'index'])->name('cart');
Route::get('cart/delete/{rowId}', ['App\Http\Controllers\CartController', 'delete'])->name('cart.delete');
Route::post('check/{rowId}', ['App\Http\Controllers\CartController', 'check'])->name('check');

Route::post('api/fetch-states', ['App\Http\Controllers\SearchController', 'fetchState']);
Route::get('search', ['App\Http\Controllers\SearchController', 'index'])->name('search');
Route::get('search/depart', ['App\Http\Controllers\SearchController', 'searchDepart'])->name('search.depart');
/*Route::post('search/depart', ['App\Http\Controllers\SearchController', 'searchDepart'])->name('search.depart');*/
Route::get('search/hotel/{id}', ['App\Http\Controllers\SearchController', 'searchHotel'])->name('search.hotel');

//Admin Orders
Route::get('admin/neworders', ['App\Http\Controllers\Admin\OrderController', 'index'])->name('admin.neworders');
Route::get('admin/order/delete/{id}', ['App\Http\Controllers\Admin\OrderController', 'orderDelete'])->name('admin.order.delete');
Route::get('admin/order/show/{id}', ['App\Http\Controllers\Admin\OrderController', 'show'])->name('admin.order.show');
Route::get('admin/order/pending/{id}', ['App\Http\Controllers\Admin\OrderController', 'pending'])->name('admin.order.pending');
Route::get('admin/orders/process', ['App\Http\Controllers\Admin\OrderController', 'ordersProcess'])->name('admin.orders.process');
Route::get('admin/order/process/{id}', ['App\Http\Controllers\Admin\OrderController', 'process'])->name('admin.order.process');
Route::get('admin/orders/delivered', ['App\Http\Controllers\Admin\OrderController', 'ordersDelivered'])->name('admin.orders.delivered');
Route::get('admin/order/delivered/{id}', ['App\Http\Controllers\Admin\OrderController', 'delivered'])->name('admin.order.delivered');
Route::get('admin/order/canceled/{id}', ['App\Http\Controllers\Admin\OrderController', 'canceled'])->name('admin.order.canceled');
Route::get('admin/orders/canceled', ['App\Http\Controllers\Admin\OrderController', 'ordersCanceled'])->name('admin.orders.canceled');

Auth::routes();

//Subscribers
Route::post('subscribe', ['App\Http\Controllers\Admin\SubscriberController', 'subscribe'])->name('subscribe');
Route::get('unsubscribe/{subscriber}', ['App\Http\Controllers\Admin\SubscriberController', 'unsubscribe'])->name('unsubscribe');
//Admin Subscribers
Route::get('admin/subscribers', ['App\Http\Controllers\Admin\SubscriberController', 'index'])->name('admin.subscribers');
Route::get('admin/subscriber/delete/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'delete'])->name('delete.subscriber');
Route::get('admin/subscriber/destroy/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'destroy'])->name('destroy.subscriber');
Route::get('admin/subscriber/restore/{id}', ['App\Http\Controllers\Admin\SubscriberController', 'restore'])->name('restore.subscriber');
Route::get('admin/subscriber/formMail/{userEmail}/{userName}', ['App\Http\Controllers\Admin\SubscriberController', 'formMail'])->name('formMail.subscriber');
Route::post('admin/subscriber/sendMail', ['App\Http\Controllers\Admin\SubscriberController', 'sendMail'])->name('sendMail.subscriber');
Route::post('admin/alerts/sendMail', ['App\Http\Controllers\Admin\AlertsController', 'sendMail'])->name('sendMail.alerts');
