<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>All Users Data</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-warning">
                <h1 class="text-center">ORM CRUD</h1>
            </div>
            <div class="col-md-12 bg-warning-subtitle">
                <h2>@yield('subtitle')</h2>
            </div>
            
        </div>
        <div class="row">
            @yield('content')
        </div>
    </div>
</body>
</html>