<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth','verified');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/add_doctor_view', [AdminController::class, 'addview']);

Route::post('/upload_doctor', [AdminController::class, 'upload']);

Route::post('/appointment', [HomeController::class, 'appointment']);

Route::get('/myappointment', [HomeController::class, 'myappointment']);

Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment']);

Route::get('/showappointments', [AdminController::class, 'showappointments']);

Route::get('/approve/{id}', [AdminController::class, 'approve']);

Route::get('/cancel/{id}', [AdminController::class, 'cancel']);

Route::get('/showdoctors', [AdminController::class, 'showdoctors']);

Route::get('/deletedoctor/{id}', [AdminController::class, 'deletedoctor']);

Route::get('/updatedoctor/{id}', [AdminController::class, 'editdoctor']);

Route::post('/updatedoctor/{id}', [AdminController::class, 'updatedoctor']);

Route::get('/emailview/{id}', [AdminController::class, 'emailview']);

Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);
