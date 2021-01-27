<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\IndexController;
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

Route::get('/',[IndexController::class,'index']);
//all Events
Route::get('/events',[EventController::class,'getAllEvents']);

//search by event name
Route::get('/search-name',[EventController::class,'searchByEventName'])->name('search-name');

//current event
Route::get('/event/{id}',[EventController::class,'getEventById']);

//search by type of event
Route::get('/search-type',[TypeController::class,'searchByTypeOfEvent'])->name('search-type');

//search
Route::get('/search',[TypeController::class,'searchByAll']);

//all archives
Route::get('/archives',[ArchiveController::class,'getAllArchives']);

//current archive
Route::get('/archive/{id}',[ArchiveController::class,'getArchiveById']);

//current type
Route::get('/type/{id}',[TypeController::class,'getTypeById']);

//all types
Route::get('/type',[TypeController::class,'getAllTypes']);