<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//  php artisan route:list

//Route::resource('gallery', 'Gallery\GalleryController', ['only' => ['destroy']]);


Route::get('gallery/active', 'Gallery\GalleryController@active');
Route::get('gallery/deleted', 'Gallery\GalleryController@deleted');
Route::delete('gallery/{gallery}', 'Gallery\GalleryController@destroy');
Route::put('gallery/{gallery}/restore', 'Gallery\GalleryController@restore');