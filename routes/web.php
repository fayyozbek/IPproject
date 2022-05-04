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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/check', function () {
    return redirect()->route('pizza.index');
});

Route::get('/managePizza', '\App\Http\Controllers\PizzaController@list')->name('pizza.index');
Route::get('/managePizza/edit', '\App\Http\Controllers\PizzaController@modifi')->name('pizza.edit');
Route::get('/mail', function(){
    $parametr=[
        'code'=>'88888',
        'email'=>'pasa',
        'order'=>'qwr'
    ];

    return new App\Mail\Confirm($parametr);
});
