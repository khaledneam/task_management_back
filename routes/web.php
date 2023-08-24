<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    if (auth()->check()) {
        return view('home');
    } else {
        return view('auth.login'); // Show login page if not authenticated
    }
});


Auth::routes();


Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

});
