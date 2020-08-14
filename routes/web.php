<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });





Auth::routes();

Route::post('contact/store','ContactController@store')->name('contact.store');
Route::get('/','ContactController@index');

Route::middleware('auth')->group(function(){
 Route::get('/admin', 'AdminController@index');
 Route::get('/get_enquiries', 'AdminController@get_enquiries');
  Route::get('find_enquiry/{id}','AdminController@find_enquiry');

});

  

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
