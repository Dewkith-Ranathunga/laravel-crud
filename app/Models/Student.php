<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public const STATUS_ACTIVE = 1;
    public const STATUS_DEACTIVE = 2;
    public const STATUS_DELETED = 3;

    protected $fillable = [
        'student_name',
        'student_email',
        'student_dob',
        'status',
    ];
}
