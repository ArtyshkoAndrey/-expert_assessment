<?php

use App\Group;
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

Route::get('/', function () {
    return view('home');
})->name('index');

Route::get('/expert', function () {
  return view('expert');
})->name('expert');

Route::post('/expert', function () {
  return view('expert');
})->name('getMarks');

Route::group(['prefix' => 'admin'], function() {
  Auth::routes(['register' => false]);
});

Route::get('/home', 'HomeController@index')->name('home');
