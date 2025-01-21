<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Single Student</title>
</head>
<body>
    <h3>Single Student</h3>
    <ul>
        @foreach($data as $key => $value)
            <li>Student Id  :   {{ $value->studentId }}</li>
            <li>Student Name:   {{ $value->name}}</li>
            <li>Student Age :   {{ $value->age}}</li>
            <li>Student Email:  {{ $value->email}}</li>
            <li>Student Phone:  {{ $value->phone}}</li>
        @endforeach
    </ul>
</body>
</html>