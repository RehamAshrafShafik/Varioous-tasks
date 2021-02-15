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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/m', function () {
    return view('mapjs');
});
Auth::routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/RequestTable', [App\Http\Controllers\HomeController::class, 'table_request'])->name('table_request');
Route::get('/UserTable', [App\Http\Controllers\HomeController::class, 'table_user'])->name('table_user');
Route::get('/Map', [App\Http\Controllers\HomeController::class, 'map'])->name('map');
Route::get('firebase',[App\Http\Controllers\FirebaseController::class, 'index'])->name('firebase');
Route::get('firebase/c',[App\Http\Controllers\FirebaseController::class, 'fire'])->name('fire');
Route::get('firebase/map',[App\Http\Controllers\FirebaseController::class, 'map'])->name('firebase_map');
Route::get('Veichle',[App\Http\Controllers\VeichleController::class, 'veichle'])->name('veichle');
Route::get('Veichle/add',[App\Http\Controllers\VeichleController::class, 'add'])->name('add_veichle');
Route::get('Veichle/update',[App\Http\Controllers\VeichleController::class, 'update'])->name('update_veichle');
Route::get('Veichle/list_active',[App\Http\Controllers\VeichleController::class, 'list_active'])->name('list_active');
Route::get('Veichle/attach_veichle',[App\Http\Controllers\VeichleController::class, 'attach_veichle'])->name('attach_veichle');
Route::get('Veichle/attach',[App\Http\Controllers\VeichleController::class, 'attach'])->name('attach');

// Route::post('/RequestTableFilter', [App\Http\Controllers\FilterController::class, 'filter_request'])->name('filter_request');
// Route::get('/UserTableFilter', [App\Http\Controllers\FilterController::class, 'filter_user'])->name('filter_user');

