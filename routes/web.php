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


//ユーザアクセス
Route::domain('{account}.localhost')->group(function(){

    Route::get('/', function($user){
        return view('userlogin',compact('user'));
    });
});

//ユーザログイン認証
// Route::namespace('user')->prefix('user')->name('user.')->group(function () {

//     // ログイン認証関連
//     Auth::routes([
//         'register' => true,
//         'reset'    => false,
//         'verify'   => false
//     ]);

//     // ログイン認証後
//     Route::middleware('auth:user')->group(function () {

//         // TOPページ
//         Route::resource('home', 'HomeController', ['only' => 'index']);

//     });
// });

Route::post('/top',[App\Http\Controllers\TopController::class, 'post'])->name('top');


//通常アクセス
Route::domain('localhost')->group(function(){
    
    Route::get('/main', function () {
        return view('main');
    });

    Route::get('/company/{url}',function ($user) {
        return $user;
    });
});


Route::prefix('company')->namespace('Company')->name('company.')->group(function(){
    // Auth::routes();
    Route::post('login', [App\Http\Controllers\Company\Auth\LoginController::class, 'login'])->name('login');
    Route::post('logout',[App\Http\Controllers\Company\Auth\LoginController::class,'logout'])->name('logout');
    Route::post('register',[App\Http\Controllers\Company\Auth\RegisterController::class,'register'])->name('register');

    Route::get('/home',[App\Http\Controllers\Company\HomeController::class,'index'])->name('company_home');
});

//企業管理者認証
// Route::namespace('admin')->prefix('admin')->name('admin.')->group(function () {

//     // ログイン認証関連
//     Auth::routes([
//         'register' => true,
//         'reset'    => false,
//         'verify'   => false
//     ]);

//     // ログイン認証後
//     Route::middleware('auth:admin')->group(function () {

//         // TOPページ
//         Route::resource('home', 'HomeController', ['only' => 'index']);

//     });

// });

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
