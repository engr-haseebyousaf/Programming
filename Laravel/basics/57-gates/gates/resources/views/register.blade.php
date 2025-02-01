<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Register User</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <form action="{{route('registerUser')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            placeholder="Haseeb Yousaf"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            placeholder="abc@mail.com"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input
                            type="text"
                            name="age"
                            id="age"
                            class="form-control"
                            placeholder="Age"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select
                            class="form-select"
                            name="role"
                            id="role"
                        >
                            <option value="admin">Admin</option>
                            <option value="editor">Editor</option>
                            <option value="writer">Writer</option>
                            <option value="subscriber">Subscriber</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            id="password"
                            placeholder="*****"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            id="password_confirmation"
                            placeholder="*****"
                        />
                    </div>
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Register
                    </button>
                    
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</body>
</html>