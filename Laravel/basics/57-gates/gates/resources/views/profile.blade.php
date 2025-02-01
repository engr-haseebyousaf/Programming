<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>profile page</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                      Profile
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <tr>
                                <td>Name</td>
                                <td>{{$user["name"]}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$user["email"]}}</td>
                            </tr>
                            <tr>
                                <td>Age</td>
                                <td>{{$user["age"]}} Years</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{route('back')}}" class="btn btn-dark">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>