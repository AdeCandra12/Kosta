<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Models\Kosans;
use App\Models\Pemiliks;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KosanController;
use App\Models\Gallerys;

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


// route welcome

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/list', [WelcomeController::class, 'list'])->name('list');

// Route Home

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Kosan

Route::get('/kosans', function () {
    $kosans = Kosans::all();

    return view('kosans.index', compact('kosans'));
})->name('kosans')->middleware('auth');

Route::resource('kosans', \App\Http\Controllers\KosanController::class)
    ->middleware('auth');


Route::get('/detail/{id}', function ($id) {

    $kosan = Kosans::findOrFail($id);
    // ->with('gallerys')
    // ->first();

    return view('detail', compact('kosan'));
});


// Route Pemilik

Route::get('/pemiliks', function () {
    $pemiliks = Pemiliks::all();

    return view('pemiliks.index', compact('pemiliks'));
})->name('pemiliks')->middleware('auth');

Route::resource('pemiliks', \App\Http\Controllers\PemilikController::class)
    ->middleware('auth');

Route::get('/detail_pemilik/{id}', function ($id) {

    $pemilik = Pemiliks::findOrFail($id);

    return view('detail_pemilik', compact('pemilik'));
});

// Route Gallery

Route::resource('gallerys', \App\Http\Controllers\GalleryController::class)
    ->middleware('auth');

Route::get('/gallerys', function () {
    $gallerys = Gallerys::all();

    return view('gallerys.index', compact('gallerys'));
})->name('gallerys')->middleware('auth');

Route::get('/gallerys', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallerys');

Route::get('/gallerys/{id}', function ($id) {

    $gallery = Gallerys::findOrFail($id);

    return view('detail_pemilik', compact('pemilik'));
});
