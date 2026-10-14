
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
