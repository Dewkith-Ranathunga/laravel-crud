
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
