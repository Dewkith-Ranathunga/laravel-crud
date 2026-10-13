
@extends('layouts.app')

@section('title', 'Add Student - Laravel CRUD')

@section('content')

<div class="container py-5">

    @if(session('success') || session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') ?? session('message') }}

            <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
            </button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <h2 class="text-center mb-4">Add Student</h2>

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Add Student Form -->
                    <form action="{{ route('student.save') }}" method="POST">
                        @csrf

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label for="fullName" class="form-label">
                                Full Name
                            </label>

                            <input type="text"
                                class="form-control"
                                id="fullName"
                                name="fullName"
                                value="{{ old('fullName') }}"
                                placeholder="Enter full name">
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email
                            </label>

                            <input type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter email address">
                        </div>

                        <!-- Date of Birth -->
                        <div class="mb-4">
                            <label for="dob" class="form-label">
                                Date of Birth
                            </label>

                            <input type="date"
                                class="form-control"
                                name="dob"
                                id="dob"
                                value="{{ old('dob') }}">
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-between">
                            <a href="/" class="btn btn-secondary">
                                Back
                            </a>

                            <button type="submit"
                                class="btn btn-primary px-4">
                                Save Student
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
