<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\DashboardContactController;
use App\Http\Controllers\DashboardProfileController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');


// Route::get('/curdprofile', function(){
//     return view('layouts.curdprofile');
// })->name('curdprofile');

Route::get('/curdcontact', function(){
    return view('curdcontact');
})->name('curdcontact');

Route::get('/profile', [ProfilesController::class, 'index'])->name('profile');
Route::get('/curdprofile', [DashboardProfileController::class, 'index']);
Route::get('/profile/{profiles:slug}', [ProfilesController::class, 'show']);

Route::get('/', [HomesController::class, 'index'])->name('home');
Route::get('/home', [HomesController::class, 'index'])->name('home');
Route::get('/curdhome', [DashboardHomeController::class, 'index']);
Route::get('/home/{homes:slug}', [HomesController::class, 'show']);

Route::get('/contact', [ContactsController::class, 'index'])->name('contact');
Route::get('/curdcontact', [DashboardContactController::class, 'index']);
Route::get('/contact/{contacts:slug}', [ContactsController::class, 'show']);


Route::get('/register', [RegisController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::resource('/curdhome', DashboardHomeController::class)->middleware('auth');
Route::resource('/curdprofile', DashboardProfileController::class)->middleware('auth');
Route::resource('/curdcontact', DashboardContactController::class)->middleware('auth');
Route::resource('/dashboard/profiles', DashboardProfileController::class)->middleware('auth');
Route::resource('/dashboard/contacts', DashboardContactController::class)->middleware('auth');
Route::resource('/dashboard/homes', DashboardHomeController::class)->middleware('auth');

Route::get('/dashboardisi', function(){
    return view('dashboardisi');
})->name('dashboardisi')->middleware('auth');

Route::get('/eror404', function () {
    return view('eror404');
});