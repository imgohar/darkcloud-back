<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;

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

Route::get('/', 'PagesController@index')->middleware('customer');
Route::post('/pin',[PagesController::class,'index2'])->name('pin');

// Demo routes
Route::middleware(['phone_verify'])->group(function(){

    Route::get("/change-profile-data",[PagesController::class,'chnageProfile']);
    Route::post("/change-profile-data",[PagesController::class,'chnageProfileSubmit']);

    Route::get("/delete-account",[PagesController::class,'deleteAccount']);

    Route::get('/datatables', 'PagesController@datatables');
    Route::get('/ktdatatables', 'PagesController@ktDatatables');
    Route::get('/select2', 'PagesController@select2');
    Route::get('/jquerymask', 'PagesController@jQueryMask');
    Route::get('/icons/custom-icons', 'PagesController@customIcons');
    Route::get('/icons/flaticon', 'PagesController@flaticon');
    Route::get('/icons/fontawesome', 'PagesController@fontawesome');
    Route::get('/icons/lineawesome', 'PagesController@lineawesome');
    Route::get('/icons/socicons', 'PagesController@socicons');
    Route::get('/icons/svg', 'PagesController@svg');
    
    Route::get("/password-reset",[PagesController::class,'passwordRreset']);
    Route::post("/password-reset",[PagesController::class,'passwordRresetSubmit']);


    Route::get('/enable-2fa',[PagesController::class,'enable2Fa']);
    Route::post('/enable-2fa',[PagesController::class,'enable2FaSubmit']);
    
    
    
    // Quick search dummy route to display html elements in search dropdown (header search)
    Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');

    Route::get("/change-profile",[PagesController::class,'changeProfile']);
    Route::post("/change-profile",[PagesController::class,'changeProfileSubmit']);

     
});

Auth::routes(['verify' => true]);
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get("/signup",function(){
    return view('auth.signup');
})->name('signup');

Route::get('/auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('/auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('/auth/github', 'Auth\GithubController@redirectToGoogle');
Route::get('/auth/github/callback', 'Auth\GithubController@handleGoogleCallback');



Route::get("/s",function(){
    $user = Auth::user();
    echo  $user->balance; // int(0)
    // $user->deposit(10);
    // echo $user->balance; // int(10)
    $user->withdraw(1);
    echo $user->balance; // int(9)
});




// Route::get('/', 'PlayerController@index')->name('customer')->middleware('customer');
// Route::get('/seller', 'ScoutController@index')->name('seller')->middleware('seller');