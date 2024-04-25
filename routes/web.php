<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageControl;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/layout1', function () { 
    return view('layout1');
});
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

//pageControl is file and class name and SHOW is the function name
// Route::get('/data',[PageControl::class,'show'])->name('data');
Route::get('/alldata','App\Http\Controllers\PageControl@show')->name('alldata');
Route::get('/view/{id}','App\Http\Controllers\PageControl@showData')->name('view.user');
// Route::POST('/add','App\Http\Controllers\PageControl@add')->name('add');
Route::post('/adduser','App\Http\Controllers\PageControl@adduser')->name('adduser');
Route::post('/update/{id}','App\Http\Controllers\PageControl@updateUser')->name('update.user');;
Route::get('/deleteAllUser','App\Http\Controllers\PageControl@deleteAllUser');
Route::get('/delete/{id}','App\Http\Controllers\PageControl@deleteuser')->name('delete.user');
Route::get('/updatePage/{id}','App\Http\Controllers\PageControl@updateDetails')->name('update.page');
// Route::get('/home',[PageControl::class,'show'])->name('home');
Route::get('/by', 'App\Http\Controllers\PageControl')->name('home');
// Route::get('/adduser',[PageControl::class,'add'])->name('add');
// Route::get('/adduser',[PageControl::class,'adduser'])->name('add.adduser');
// Route::get('/home', 'App\Http\Controllers\PageControl@show')->name('home');
// Route::get('/adduser', 'PostController@add')->name('add');
// Route::post('/adduser', 'PostController@adduser')->name('add.adduser');
