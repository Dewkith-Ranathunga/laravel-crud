@extends('layouts.app')

@section('title', 'Edit Student - Laravel CRUD')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <h2 class="text-center mb-4">Edit Student</h2>


                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <form action="{{ route('students.update', $student->id) }}"
                        method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="fullName" class="form-label">
                                Full Name
                            </label>

                            <input type="text"
                                class="form-control"
                                id="fullName"
                                name="fullName"
                                value="{{ $student->student_name }}"
                                required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email
                            </label>

                            <input type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{ $student->student_email }}"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="dob" class="form-label">
                                Date of Birth
                            </label>

                            <input type="date"
                                class="form-control"
                                id="dob"
                                name="dob"
                                value="{{ $student->student_dob }}"
                                required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('students.index') }}"
                                class="btn btn-secondary">
                                Back
                            </a>

                            <button type="submit"
                                class="btn btn-primary px-4">
                                Update Student
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection