<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;

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

Auth::routes();

Route::get('logout', [LoginController::class, 'logout']);
// Route::get('/category_dtail/{id}', [FrontController::class, 'cat_detail']);
Route::get('/category_dtail/{id}', [FrontController::class, 'index']);
Route::get('/appointment_dtail/{id}', [FrontController::class, 'appointment_detail']);
Route::post('/appointment_store', [FrontController::class, 'appointment_store']);
Route::get('/appoint_payment', [FrontController::class, 'appoint_payment'])->name('apponintment');
Route::get('/panding_appointment', [FrontController::class, 'panding']);
Route::get('/history', [FrontController::class, 'history']);
Route::get('/payment/{id}', [FrontController::class, 'checkout']);
Route::post('/bank_transaction/{id}', [FrontController::class, 'bank_transaction']);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/add_category', [CategoryController::class, 'index'])->name('add.category');
    Route::post('/store_category', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/view_category', [CategoryController::class, 'show'])->name('view.category');
    Route::get('/category_update/{id}', [CategoryController::class, 'update'])->name('update.category');
    Route::get('/category_delete/{id}', [CategoryController::class, 'delete'])->name('delete.category');
    Route::post('/category_edit/{id}', [CategoryController::class, 'edit'])->name('edit.category');

    Route::get('/add_service', [ServiceController::class, 'index'])->name('add.service');
    Route::post('/store_service', [ServiceController::class, 'store'])->name('store.service');
    Route::get('/view_service', [ServiceController::class, 'show'])->name('view.service');
    Route::get('/service_update/{id}', [ServiceController::class, 'update'])->name('update.service');
    Route::get('/service_delete/{id}', [ServiceController::class, 'delete'])->name('delete.service');
    Route::post('/service_edit/{id}', [ServiceController::class, 'edit'])->name('edit.service');

    Route::get('providor/history', [ServiceController::class, 'history']);
    Route::get('upcoming', [ServiceController::class, 'upcoming']);
    Route::get('deliverd/{id}', [ServiceController::class, 'deliver']);
    
   
    

});