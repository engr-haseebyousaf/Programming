<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update Student Form</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>Update Student</h1>
                <form action="{{ route('student.update', $data[0]->studentId)}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" value="{{ $data[0]->name}}" name="studentName" id="studentName" class="form-control"
                            placeholder="studentName" />
                    </div>
                    <div class="mb-3">
                        <label for="studentAge" class="form-label">Student Age</label>
                        <input type="number" value="{{ $data[0]->age}}" min="18" max="64" name="studentAge" id="studentAge" class="form-control"
                            placeholder="studentAge" />
                    </div>
                    <div class="mb-3">
                        <label for="studentEmail" class="form-label">Student Email</label>
                        <input type="email" value="{{ $data[0]->email}}" name="studentEmail" id="studentEmail" class="form-control"
                            placeholder="studentEmail" />
                    </div>
                    <div class="mb-3">
                        <label for="studentPhone" class="form-label">Student Phone</label>
                        <input type="text" name="studentPhone" value="{{ $data[0]->phone}}" id="studentPhone" class="form-control"
                            placeholder="studentPhone" />
                    </div>
                    <button type="submit" class="btn btn-success">
                        Update Student
                    </button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>
