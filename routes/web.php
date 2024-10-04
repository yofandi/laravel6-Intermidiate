<?php

use Illuminate\Support\Facades\Auth;
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

app()->bind('contoh', function () {
    return new \App\Tabungan;
});

// app()->singleton('contoh', function (){
//     return new \App\Tabungan;
// });

Route::get('/', function () {
    return view('welcome');
    // dd(app('contoh'), app('contoh'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
