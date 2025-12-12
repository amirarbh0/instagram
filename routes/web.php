<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect(route('home'));
});




Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::resource('/posts', "App\Http\Controllers\PostController")->names('posts');
    Route::get('/feeds', "App\Http\Controllers\PostController@fol   wers")->name('feeds');
    Route::resource('/manage/users', "App\Http\Controllers\UserController")->except(['create', 'show', 'store'])->names('users');
    Route::get('/{username}', "App\Http\Controllers\ProfileController@show")->name('profile');
});
