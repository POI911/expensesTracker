<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

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
    return redirect()->route('records.index');
});


Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register')->middleware('guest');
    Route::post('/register', 'store')->name('signup')->middleware('guest');
});


Route::controller(SessionController::class)->group(function () {

    Route::get('/login', 'create')->name('login')->middleware('guest');
    Route::post('/login', 'store')->name('signin')->middleware('guest');
    Route::get('/logout', 'destroy')->name('logout')->middleware('auth');
});


Route::controller(RecordController::class)->group(function () {
    Route::get('/records/index', 'index')->name('records.index')->middleware('auth');
    Route::get('/records/create', 'create')->name('records.create')->middleware('auth');
    Route::post('/records/store', 'store')->name('records.store')->middleware('auth');
    Route::get('/records/statics', 'statics')->name('records.statics')->middleware('auth');
    Route::get('/records/edit/record/{record_id}', 'edit')->name('records.edit')->middleware('auth');
    Route::post('/records/update/{record_id}', 'update')->name('records.update')->middleware('auth');
    Route::get('/records/delete/record/{record_id}', 'delete')->name('records.delete')->middleware('auth');
});

Route::delete('/records/bulk-delete', [RecordController::class, 'bulkDelete'])->name('records.bulkDelete');
