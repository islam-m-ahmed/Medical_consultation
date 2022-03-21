<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SendEmailController;
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
// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//home
Route::get('/',[HomeController::class, 'index']);
Route::get('/Home',[HomeController::class, 'redirect'])->name('Home')->middleware('auth','verified');
//about us
Route::get('about',[HomeController::class, 'about']);
// page doctors
Route::get('doctors',[HomeController::class, 'doctors']);
// Route::post('/appointment', [AppointmentController::class, 'appointment']);
// page all_latest
Route::get('all_latest',[HomeController::class, 'all_latest']);
// appointment_page
Route::get('appointment_page',[HomeController::class, 'appointment_page']);


//only admin show
Route::middleware(['Admin'])->group(function(){
//doctor
Route::get('/add_doctor_view', [AdminController::class, 'addView']);
Route::match(['get', 'post'],'/upload_doctor', [AdminController::class, 'upload']);
// Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::get('/showDoctor', [AdminController::class, 'showDoctor']);
Route::get('/update_doctor/{id}', [AdminController::class, 'update_doctor']);
Route::post('/store_doctor/{id}', [AdminController::class, 'store_doctor']);
Route::get('/delete_doctor/{id}', [AdminController::class, 'delete_doctor']);

//appointment
Route::get('/showAppointment', [AppointmentController::class, 'showAppointment']);
Route::get('/approved/{id}', [AppointmentController::class, 'approved']);
Route::get('/canceled/{id}', [AppointmentController::class, 'canceled']);

//send email
Route::get('send_email/{id}',[SendEmailController::class, 'send_email']);
Route::post('send_now/{id}',[SendEmailController::class, 'send_now']);

});
// only auth
Route::middleware(['auth'])->group(function(){
//store appointment from  user
Route::post('/appointment', [AppointmentController::class, 'appointment']);

// take appointment
Route::get('/myAppointment', [AppointmentController::class, 'myAppointment']);
Route::get('/cancel/{id}', [AppointmentController::class, 'cancel'])->where('id','[0-9]+');

});
//
