<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageControl;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

// Route::get('/layout1', function () { 
//     return view('layout1');
// });

Route::get('/layoutDesign', function () { 
    return view('layout2');
});
Route::get('/adduser', function () { 
    return view('home');
});
Route::get('/updateuser', function () { 
    return view('update');
});

Route::prefix('page')->group(function () {

});

Route::get('/alldata','App\Http\Controllers\PageControl@show')->name('alldata');
Route::get('/view/{id}','App\Http\Controllers\PageControl@showData')->name('view.user');
Route::post('/adduser','App\Http\Controllers\PageControl@adduser')->name('adduser');
Route::post('/update/{id}','App\Http\Controllers\PageControl@updateUser')->name('update.user');;
Route::get('/deleteAllUser','App\Http\Controllers\PageControl@deleteAllUser');
Route::get('/delete/{id}','App\Http\Controllers\PageControl@deleteuser')->name('delete.user');
Route::get('/updatePage/{id}','App\Http\Controllers\PageControl@updateDetails')->name('update.page');
Route::get('/by', 'App\Http\Controllers\PageControl')->name('home');
Route::post('/check_credential', 'App\Http\Controllers\PageControl@checkCredentials');
Route::get('/layout', 'App\Http\Controllers\PageControl@layout')->name('layout');

// code for auth via username and pass
// Route::get('/', function()
// {
//     if( Session::has('user') ) return 'Welcome ' . Session::get('user')->u_username;
//     return 'Please log in <a href="/login">login</a>';
// });

// Route::get('/login', function() {
//     $credentials = array('u_username' => 'johndoe', 'password' => 'johnny12');

//     if( Auth::attempt($credentials, true) ){

//         Session::put('user', Auth::user());
//         return 'You have successfully logged in, ' . Auth::user()->u_username . '! <a href="/">Go back to Index</a>';
//     } 

//     return '<h1>Username/Password wrong.</h1>Your credentials seem to be wrong. Please re-check them.';

// });

// Route::get('/logout', function() {
//     Auth::logout();
//     Session::forget('user');
//     return Redirect::to('/');
// });