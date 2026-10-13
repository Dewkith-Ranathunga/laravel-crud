<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    //fillable used to specify which attributes can be mass-assigned when creating or updating a student record. ce.
    protected $fillable = [
        'student_name',
        'student_email',
        'student_dob',
    ];
}

//model allows you to interact with the 'students' table in the database, perform CRUD operations, and define relationships with other models if needed.