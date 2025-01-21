<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Student Form</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>Add Student</h1>
                <form action="{{ route('addStudent')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" name="studentName" id="studentName" class="form-control"
                            placeholder="studentName" />
                    </div>
                    <div class="mb-3">
                        <label for="studentAge" class="form-label">Student Age</label>
                        <input type="number" min="18" max="64" name="studentAge" id="studentAge" class="form-control"
                            placeholder="studentAge" />
                    </div>
                    <div class="mb-3">
                        <label for="studentEmail" class="form-label">Student Email</label>
                        <input type="email" name="studentEmail" id="studentEmail" class="form-control"
                            placeholder="studentEmail" />
                    </div>
                    <div class="mb-3">
                        <label for="studentPhone" class="form-label">Student Phone</label>
                        <input type="text" name="studentPhone" id="studentPhone" class="form-control"
                            placeholder="studentPhone" />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Add Student
                    </button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
