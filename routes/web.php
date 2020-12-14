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

Route::domain('{x}.localhost')->group(function(){
    Route::get('/', function($user){
        return view('userlogin',compact('user'));
    });
});

Route::post('/top',[App\Http\Controllers\TopController::class, 'post'])->name('top');


Route::domain('localhost')->group(function(){
    Route::get('/main', function () {
        return view('main');
    });

    Route::get('/company/{url}',function ($user) {
        return $user;
    });
});



// Route::group(
//     array("domain" => "abc.laravel.localhost"),
//     function() {
//         dd("b");
//     }
// );

// Route::group(
//     array("domain" => "{account}.laravel.localhost"),
//     function() {
//         dd("a");
//     }
// );



Route::get('/', function () {
    return view('welcome');
});


// Route::get('/', function () {
//    return view('welcome');
// })->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();