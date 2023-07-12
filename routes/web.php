<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('index');
// });
Route::view('/', 'index');

// Route::get('about-us', function(){
//     return view('about');
// })->name('about');
Route::get('about-us', [AboutUsController::class, 'about'])->name('about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// routes for slider
Route::get('sliders', [SliderController::class, 'index'])->name('sliders.index');
Route::get('sliders/create', [SliderController::class, 'create'])->name('sliders.create');

Route::post('sliders', [SliderController::class, 'store'])->name('sliders.store');

Route::delete('sliders/{id}', [SliderController::class, 'destroy'])->name('sliders.destroy');
