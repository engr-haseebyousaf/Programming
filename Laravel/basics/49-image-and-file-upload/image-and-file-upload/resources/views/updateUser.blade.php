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
            <h1>User Update Form</h1>
            <div class="col-md-3 mt-5">
                <img src="{{asset("storage/" . $user->file_path)}}" id="oldImage" class="img img-fluid img-thumbnail" alt="">
            </div>
            <div class="col-md-9 mt-5">
                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="userImage"  class="form-label">Choose Image</label>
                        <input type="file" onchange="document.querySelector('#oldImage').src=window.URL.createObjectURL(this.files[0])"
                            class="form-control @error('userImage') is-invalid @enderror @if (session('success')) is-valid @endif"
                            name="userImage" id="userImage" placeholder="Click to select Image"
                            aria-describedby="userImage" />
                    </div>
                    <button type="submit" class="btn btn-success">
                        Update
                    </button>

                </form>
            </div>
       
    </div>
</body>

</html>
