<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>User form</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <h1>User Form</h1>
            <div class="col-md-12 mt-5">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="userImage" class="form-label">Choose Image</label>
                        <input type="file"
                            class="form-control @error('userImage') is-invalid @enderror @if (session('success')) is-valid @endif"
                            name="userImage" id="userImage" placeholder="Click to select Image"
                            aria-describedby="userImage" />
                        @error('userImage')
                            <div id="userImage" class="form-text">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>

                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-3">
                    <img src="{{ asset('storage/' . $user->file_path) }}" class="img img-fluid img-thumbnail"
                        alt="">
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                    <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning">Update</a>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
