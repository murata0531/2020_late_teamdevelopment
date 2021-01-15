<?php

use Illuminate\Support\Facades\Route;
use App\Models\Company;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/top',[App\Http\Controllers\TopController::class, 'post'])->name('top');

//ユーザアクセス
Route::domain('{account}.localhost')->group(function(){

    Route::get('/', function($user){

        $company_name = DB::select('select name from companies where url = ?',[$user]);

        return view('userwelcome',compact('user','company_name'));

    });

    Route::get('/user/login', function($user){
        return view('userlogin',compact('user'));
    });

    Route::get('/user/register', function($user){
        return view('userregister',compact('user'));
    });

});

//ユーザログイン認証
// Route::prefix('user')->namespace('User')->name('user.')->group(function(){
//     // Auth::routes();
//     Route::post('login', [App\Http\Controllers\User\Auth\LoginController::class, 'login']);
//     Route::post('logout',[App\Http\Controllers\User\Auth\LoginController::class,'logout'])->name('logout');
//     Route::post('register',[App\Http\Controllers\User\Auth\RegisterController::class,'register']);
//     Route::get('login',[App\Http\Controllers\User\Auth\LoginController::class,'showLoginForm'])->name('login');
//     Route::get('register',[App\Http\Controllers\User\Auth\RegisterController::class,'showRegistrationForm'])->name('register');


//     //ログイン認証後
//     Route::middleware('auth:user')->group(function () {
//         Route::get('/home',[App\Http\Controllers\Company\HomeController::class,'index'])->name('user_home');
//     });
    
// });

//通常アクセス
Route::domain('localhost')->group(function(){
    
    Route::get('/', function () {

        // $url = Company::all('url');
        $url = DB::select('select url from companies;');
        return view('main',compact('url'));
    });

    // Route::get('/company/{url}',function ($user) {
    //     return $user;
    // });
});


//企業管理者認証
Route::prefix('company')->namespace('Company')->name('company.')->group(function(){
    // Auth::routes();
    Route::post('login', [App\Http\Controllers\Company\Auth\LoginController::class, 'login']);
    Route::post('logout',[App\Http\Controllers\Company\Auth\LoginController::class,'logout'])->name('logout');
    Route::post('register',[App\Http\Controllers\Company\Auth\RegisterController::class,'register']);
    Route::get('login',[App\Http\Controllers\Company\Auth\LoginController::class,'showLoginForm'])->name('login');
    Route::get('register',[App\Http\Controllers\Company\Auth\RegisterController::class,'showRegistrationForm'])->name('register');


    //ログイン認証後
    Route::middleware('auth:company')->group(function () {
        Route::get('/home',[App\Http\Controllers\Company\HomeController::class,'index']);
    });

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



// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/', function () {
//    return view('welcome');
// })->middleware('auth');



