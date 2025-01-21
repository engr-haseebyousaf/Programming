<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>All students</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3>Students Data</h3>
                <a href="{{ route('student.add')}}" class="btn btn-success mb-3">Add Student</a>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Student Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>email</th>
                        <th>age</th>
                        <th>View</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                    
                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{ $value->studentId }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->age }}</td>
                            <td><a href="{{ route('view.student', $value->studentId) }}" class="btn btn-primary btn-small">View</a></td>
                            <td><a href="{{ route('view.delete', $value->studentId) }}" class="btn btn-danger btn-small">Delete</a></td>
                            <td><a href="{{ route('page.update', $value->studentId) }}" class="btn btn-warning btn-small">Update</a></td>
                        </tr>
                    @endforeach
                    
                </table>
            </div>
            <div class="col-md-8 mx-auto">{{ $data->links("pagination::bootstrap-5") }}</div>
        </div>
    </div>
</body>
</html>