<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::namespace('Api')->name('api.')->group(function(){
    Route::get("/posts","Postcontroller@index")->name('posts');
    Route::get("/posts/{slug}","PostController@show")->name('posts.show');
    Route::get("/categories","CategoryController@index")->name("categories");
    Route::get("/categories/{slug}","CategoryController@show")->name("category.show");
    Route::post("/comments","CommentController@store")->name("comments.store");
});