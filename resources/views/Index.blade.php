<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Student - Laravel CRUD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('CSS/custom.css') }}">
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">

                        <h2 class="text-center mb-4">Add Student</h2>

                        <form>

                            <div class="mb-3">
                                <label for="fullName" class="form-label">
                                    Full Name
                                </label>
                                <input type="text"
                                       class="form-control"
                                       id="fullName"
                                       placeholder="Enter full name">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    Email
                                </label>
                                <input type="email"
                                       class="form-control"
                                       id="email"
                                       placeholder="Enter email address">
                            </div>

                            <div class="mb-4">
                                <label for="dob" class="form-label">
                                    Date of Birth
                                </label>
                                <input type="date"
                                       class="form-control"
                                       id="dob">
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="/" class="btn btn-secondary">
                                    Back
                                </a>

                                <button type="submit" class="btn btn-primary px-4">
                                    Save Student
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>