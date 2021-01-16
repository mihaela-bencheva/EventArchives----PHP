<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TypeController;
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
    return view('welcome');
});
Route::get('/events',[EventController::class,'getAllEvents']);

Route::get('/search-name',[EventController::class,'searchByEventName'])->name('search-name');

Route::get('/search-type',[TypeController::class,'searchByTypeOfEvent'])->name('search-type');

Route::get('/search',[TypeController::class,'searchByAll']);