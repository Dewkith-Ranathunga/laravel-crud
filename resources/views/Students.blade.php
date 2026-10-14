
@extends('layouts.app')

@section('title', 'Students - Laravel CRUD')

@section('content')

<div class="container py-5">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Student List</h2>

        <!-- Add Student Modal Button -->
        <button type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#addStudentModal">
            Add Student
        </button>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>
        </div>
    @endif

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close">
            </button>
        </div>
    @endif

    <!-- Student Table -->
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
                                        <span class="badge bg-success">
                                            Active
                                        </span>
                                    @elseif($student->status == 2)
                                        <span class="badge bg-secondary">
                                            Deactive
                                        </span>
                                    @endif
                                </td>

                                <!-- Actions -->
                                <td>

                                    <!-- Edit Student Modal Button -->
                                    <button type="button"
                                            class="btn btn-sm btn-warning"
                                            data-bs-toggle="modal"
                                            data-bs-target="#editStudentModal{{ $student->id }}">
                                        Edit
                                    </button>

                                    <!-- Activate / Deactivate Student -->
                                    <form action="{{ route('students.status', $student->id) }}"
                                          method="POST"
                                          class="d-inline">

                                        @csrf
                                        @method('PATCH')

                                        @if($student->status == 1)
                                            <button type="submit"
                                                    class="btn btn-sm btn-secondary">
                                                Deactivate
                                            </button>
                                        @else
                                            <button type="submit"
                                                    class="btn btn-sm btn-success">
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

                                        <button type="submit"
                                                class="btn btn-sm btn-danger">
                                            Delete
                                        </button>

                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6"
                                    class="text-center text-muted py-4">
                                    No students found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <!-- Back Button -->
            <a href="/" class="btn btn-secondary mt-3">
                Back to Home
            </a>

        </div>
    </div>

</div>

<!-- Add Student Modal -->
@include('students.add-modal')

<!-- Edit Student Modals -->
@foreach($students as $student)
    @include('students.edit-modal', ['student' => $student])
@endforeach

@endsection

@section('scripts')

<!-- Reopen Modal When Validation Fails -->
@if($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const formType = @json(old('_form'));
        const studentId = @json(old('_student_id'));

        const modalId = formType === 'edit' && studentId
            ? 'editStudentModal' + studentId
            : 'addStudentModal';

        const modalElement = document.getElementById(modalId);

        if (modalElement) {
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        }

    });
</script>
@endif

@endsection
