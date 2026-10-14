
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

        <!-- Manage Students -->
        <a href="{{ route('students.index') }}"
           class="btn btn-primary px-4">
            Manage Students
        </a>

    </div>
</div>

@endsection
