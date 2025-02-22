<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-5">
                <h1>Salam {{Auth::user()->name}}</h1>
                {{-- @if(Gate::allows("isAdmin"))
                    <a href="" class="btn btn-success">Admin</a>
                @else
                    <a href="#" class="btn btn-success">No Admin</a>
                @endif --}}

                @can("isAdmin")
                    <a href="" class="btn btn-success">Admin</a>
                @else
                    <a href="#" class="btn btn-success">No Admin</a>
                @endcan

                @cannot("isAdmin")
                    <h3>Hello simple user!</h3>
                @else
                    <h3>Hello Admin user!</h3>
                @endcannot
                <a href="{{route('profile',Auth::user()->id)}}" class="btn btn-warning">Profile Page</a>
                <a href="{{route('posts',Auth::user()->id)}}" class="btn btn-primary">Post Page</a>
                <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>