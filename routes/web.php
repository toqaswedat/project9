<?php

use App\Http\Controllers\ShowmovieController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Auth;
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

Route::get('about', function () {
    return view('about');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('/profile', [UserContoller::class, 'userProfile']);
Route::put('updateUser/{id}', [UserContoller::class, 'updateProfileUser']);

// Route::get('/movies', function () {
//     return view('moviegrid');
// });
Route::resource('movies',TicketController::class);
Route::get('moviegrid',[ShowmovieController::class,'showmovie']);
Route::get('moviesingle/{id}',[ShowmovieController::class,'showsinglemovie'])->name('moviesingle');
Route::get('movieAdd/{id}', [ShowmovieController::class, 'insert']);
Route::get('ticketform/{id}',[ShowmovieController::class,'showbooking'])->name('ticketform');



Route::resource('admin/tickets', TicketController::class);
Route::resource('admin/users', UserContoller::class);

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::post('/movies/{id}', [TicketController::class, 'book'])->name('movies.book');

