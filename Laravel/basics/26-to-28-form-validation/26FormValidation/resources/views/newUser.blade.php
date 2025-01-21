<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>New User | Custom Validation</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <form action="{{route('addNewUser')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="newUserName" class="form-label">Name</label>
                        <input type="text" value="{{old("newUserName")}}" name="newUserName" id="newUserName" class="form-control @error('newUserName') is-invalid @enderror"
                            placeholder="Enter Your Name" aria-describedby="newUserName" />
                        @error('newUserName')
                            <small id="newUserName" class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newUserEmail" class="form-label">Email</label>
                        <input type="email" value="{{old("newUserEmail")}}" class="form-control" name="newUserEmail" id="newUserEmail"
                            aria-describedby="newUserEmail" placeholder="abc@mail.com" />
                        @error('newUserEmail')
                            <small id="newUserEmail" class="form-text text-danger">{{ $message }}</small>
                        @enderror
                        
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>

                </form>
            </div>
        </div>
    </div>
</body>

</html>