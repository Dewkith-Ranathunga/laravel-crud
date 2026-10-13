
@extends('layouts.app')

@section('title', 'Home - Laravel CRUD')

@section('content')

<div class="container">
    <div class="text-center py-5">

        <h1 class="display-4 fw-bold">
            Laravel CRUD
        </h1>

        <p class="lead text-muted">
            Student Management System
        </p>

        <p class="mb-4">
            Manage student records easily using Laravel.
        </p>

        <!-- Add Student -->
        <a href="{{ url('/AddStudent') }}"
           class="btn btn-primary px-4">
            Add Student
        </a>

        <!-- View Students -->
        <a href="{{ route('students.index') }}"
           class="btn btn-outline-primary px-4 ms-2">
            View Students
        </a>

    </div>
</div>

@endsection
