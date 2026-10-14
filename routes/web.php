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


// Display the edit form for a specific student
Route::get('/Students/{id}/edit', [StudentController::class, 'edit'])
    ->name('students.edit');

// Save the updated student data
Route::put('/Students/{id}', [StudentController::class, 'update'])
    ->name('students.update');

// Delete a specific student    
Route::delete('/Students/{id}', [StudentController::class, 'destroy'])
    ->name('students.destroy');

// Change the status of a specific student
Route::patch('/Students/{id}/status', [StudentController::class, 'changeStatus'])
    ->name('students.status');
