<?php

use App\Http\Controllers\Admin\KopiController;
use App\Http\Controllers\Admin\HomeController;
use App\Models\Kopi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

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
    return view('auth.login');//nama dari view
});
Route::middleware('auth', 'CheckRole:admin')->group(function () {

    Route::get('/create', [KopiController::class, 'create'])->name("kopi-create");
    //get method untuk menampikan data
    Route::post('/store', [KopiController::class, 'store'])->name("kopi-store"); //mengirim data ke data base
    //post untuk mengupdate produk yang telah diedit atau menyimpan data hasil inputan
    // Route::get('/index', [KopiController::class, 'index'])->name("kopi-index");
    Route::delete('/delete/{id}', [KopiController::class, 'delete'])->name("kopi-delete"); // delete bawaan laravel
    Route::get('/edit/{id}', [KopiController::class, 'edit'])->name("kopi-edit");
    Route::put('/update/{id}', [KopiController::class, 'update'])->name("kopi-update"); //memberikan alias atau namalain
});

Route::middleware('auth', 'CheckRole:admin,user')->group(function () {

    // Route::get('/create', [KopiController::class, 'create'])->name("kopi-create");
    //get method untuk menampikan data
    // Route::post('/store', [KopiController::class, 'store'])->name("kopi-store"); //mengirim data ke data base
    //post untuk mengupdate produk yang telah diedit atau menyimpan data hasil inputan
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/index', [KopiController::class, 'index'])->name("kopi-index");
    // Route::delete('/delete/{id}', [KopiController::class, 'delete'])->name("kopi-delete"); // delete bawaan laravel
    // Route::get('/edit/{id}', [KopiController::class, 'edit'])->name("kopi-edit");
    // Route::put('/update/{id}', [KopiController::class, 'update'])->name("kopi-update"); //memberikan alias atau namalain
});
Auth::routes();





