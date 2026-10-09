<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/AddStudent', [StudentController::class, 'AddStudent']);

Route::post('/StudentSave', [StudentController::class, 'save'])
    ->name('student.save');

Route::get('/Students', [StudentController::class, 'index'])
    ->name('students.index');    