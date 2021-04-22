<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

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

Route::get('/', 'productController@home');
Route::get('test','productController@test');
Route::get('Menu/{category_name}','productController@show_list');
Route::get('products/{id}','productController@show')->name('product.show')->whereNumber('id');
Route::get('products/search/{keyWord}','productController@searchGet')->name('product.searchGet');
Route::post('productSearch','productController@search')->name('product.search');

Route::get('Cart','cartController@show')->name('cart.show');
Route::get('Cart/remove/{rowId}','cartController@remove')->name('cart.remove');
Route::get('Cart/destroy','cartController@destroy')->name('cart.destroy');
Route::get('Cart/checkout','cartController@show_checkout')->name('cart.show_checkout');
Route::post('Cart/checkout','cartController@checkout')->name('cart.checkout');
Route::post('Cart/add/{id}','cartController@add_product')->name('cart.add_product');
Route::post('Cart/update','cartController@update')->name('cart.update');
Route::post('Cart/add','cartController@add')->name('cart.add');

Route::get('Reservation','reservationsController@show')->name('reservation.show');
Route::post('Reservaion','reservationsController@store')->name('reservation.store');

Route::get('Invoices','invoiceController@show')->name('invoices.show')->middleware('checkAuth');
Route::get('Invoices/{id}','invoiceController@show_detail')->name('invoices.show_detail')->whereNumber('id')->middleware(['checkAuth','checkInvoiceDetailAuth']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('admin/{age}',function(){
//     return "Welcome Admin";
// })->middleware('checkAge');
Route::middleware('checkRoleAdmin')->group(function () {
    //
    Route::get('Admin','homeAdminController@index')->name('Admin');
    Route::get('Admin/Product','productAdminController@create')->name('Admin.product.create');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
