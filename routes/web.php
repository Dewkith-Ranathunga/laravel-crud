<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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
    return view('welcome');
});

Route::get('/StudentSave', function () {
    return view('Index');
});

Route::controller(StudentController::class)->group(function () {
    Route::get('/AddStudent', 'AddStudent');
    Route::post('/StudentSave', 'save')->name('student.save');

});         