<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add User Form</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $key => $value)
                            <li>{{ $key }} {{ $value }}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{ route('addUser') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="userName" class="form-label">User Name</label>
                        <input type="text" value="{{old('userName')}}" name="userName" id="userName" class="form-control @error('userName') is-invalid @enderror" />
                        @error('userName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="userEmail" class="form-label">User Email</label>
                        <input type="text" value="{{old('userEmail')}}" name="userEmail" id="userEmail" class="form-control @error('userEmail') is-invalid @enderror"/>
                        @error('userEmail')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="userAge" class="form-label">User Age</label>
                        <input type="text" value="{{old('userAge')}}" name="userAge" min="18" id="userAge" class="form-control @error('userAge') is-invalid @enderror" />
                        @error('userAge')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="userCity" class="form-label @error('userCity') is-invalid @enderror">User City</label>
                        <select class="form-select" value="{{old('userCity')}}" name="userCity" id="userCity">
                            <option value="faisalabad">Faisalabad</option>
                            <option value="lahore">Lahore</option>
                            <option value="islamabad">Islamabad</option>
                        </select>
                        @error('userCity')
                            <span class="text-danger">{{ $message }}</span>
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