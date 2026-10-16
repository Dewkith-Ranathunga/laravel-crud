
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

<div class="modal fade" id="addStudentModal" tabindex="-1"
     aria-labelledby="addStudentTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="{{ route('student.save') }}" method="POST">
                @csrf
                <input type="hidden" name="_form" value="add">

                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentTitle">Add Student</h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="addFullName" class="form-label">Full Name</label>
                        <input type="text" name="fullName" id="addFullName"
                               class="form-control"
                               value="{{ old('_form') === 'add' ? old('fullName') : '' }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="addEmail" class="form-label">Email</label>
                        <input type="email" name="email" id="addEmail"
                               class="form-control"
                               value="{{ old('_form') === 'add' ? old('email') : '' }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="addDob" class="form-label">Date of Birth</label>
                        <input type="date" name="dob" id="addDob"
                               class="form-control"
                               value="{{ old('_form') === 'add' ? old('dob') : '' }}"
                               required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        Save Student
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


<!-- Edit Student Modals -->

<div class="modal fade" id="editStudentModal{{ $student->id }}"
     tabindex="-1"
     aria-labelledby="editStudentTitle{{ $student->id }}"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form action="{{ route('students.update', $student->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="_form" value="edit">
                <input type="hidden" name="_student_id" value="{{ $student->id }}">

                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentTitle{{ $student->id }}">
                        Edit Student
                    </h5>
                    <button type="button" class="btn-close"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="editName{{ $student->id }}" class="form-label">
                            Full Name
                        </label>
                        <input type="text"
                               class="form-control"
                               id="editName{{ $student->id }}"
                               name="fullName"
                               value="{{ old('_form') === 'edit' && old('_student_id') == $student->id ? old('fullName') : $student->student_name }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="editEmail{{ $student->id }}" class="form-label">
                            Email
                        </label>
                        <input type="email"
                               class="form-control"
                               id="editEmail{{ $student->id }}"
                               name="email"
                               value="{{ old('_form') === 'edit' && old('_student_id') == $student->id ? old('email') : $student->student_email }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="editDob{{ $student->id }}" class="form-label">
                            Date of Birth
                        </label>
                        <input type="date"
                               class="form-control"
                               id="editDob{{ $student->id }}"
                               name="dob"
                               value="{{ old('_form') === 'edit' && old('_student_id') == $student->id ? old('dob') : $student->student_dob }}"
                               required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Update Student
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>


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
