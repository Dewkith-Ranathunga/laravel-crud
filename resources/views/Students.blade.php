
@extends('layouts.app')

@section('title', 'Students - Laravel CRUD')

@section('content')

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Student List</h2>

        <a href="{{ url('/AddStudent') }}" class="btn btn-primary">
            Add Student
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->student_email }}</td>
                                <td>{{ $student->student_dob }}</td>

                                <!-- Student Status -->
                                <td>
                                    @if($student->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @elseif($student->status == 2)
                                        <span class="badge bg-secondary">Deactive</span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td>
                                    <!-- Edit Student -->
                                    <a href="{{ route('students.edit', $student->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <!-- Activate / Deactivate Student -->
                                    <form action="{{ route('students.status', $student->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('PATCH')

                                        @if($student->status == 1)
                                            <button type="submit" class="btn btn-sm btn-secondary">
                                                Deactivate
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-sm btn-success">
                                                Activate
                                            </button>
                                        @endif

                                    </form>

                                    <!-- Delete Student -->
                                    <form action="{{ route('students.destroy', $student->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this student?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    No students found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <a href="/" class="btn btn-secondary mt-3">
                Back to Home
            </a>

        </div>
    </div>

</div>

@endsection
