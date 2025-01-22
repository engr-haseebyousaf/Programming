@extends('layout')
@section('subtitle')
Update User
@endsection

@section('content')
<div class="col-md-7 mx-auto">
    <form action="{{route('user.update', $user->userId)}}" method="post">
        @csrf
        @method("put")
        <div class="mb-3">
            <label for="updateUserName" class="form-label">Name</label>
            <input type="text" name="updateUserName" value="{{$user->name}}" id="updateUserName" class="form-control @error('updateUserName') is-invalid @enderror" placeholder="User Name"
                aria-describedby="updateUserName" />
                @error('updateUserName')
                    <small id="updateUserName" class="text-danger">{{$message}}</small>
                @enderror
            
        </div>
        <div class="mb-3">
            <label for="updateUserEmail" class="form-label">Email</label>
            <input type="text" name="updateUserEmail" value="{{$user->email}}" id="updateUserEmail" class="form-control @error('updateUserName') is-invalid @enderror" placeholder="User Email"
                aria-describedby="updateUserEmail" />
                @error('updateUserEmail')
                    <small id="updateUserEmail" class="text-danger">{{$message}}</small>
                @enderror       
        </div>
        <div class="mb-3">
            <label for="updateUserAge" class="form-label">Age</label>
            <input type="number" min="18" value="{{$user->age}}" name="updateUserAge" id="updateUserAge" class="form-control @error('updateUserName') is-invalid @enderror"
                placeholder="User Email" aria-describedby="updateUserAge" />
                @error('updateUserAge')
                    <small id="updateUserAge" class="text-danger">{{$message}}</small>
                @enderror
        </div>
        <div class="mb-3">
            <label for="updateUserCity" class="form-label">City</label>
            <input type="text" value="{{$user->city}}" name="updateUserCity" id="updateUserCity" class="form-control @error('updateUserName') is-invalid @enderror" placeholder="User City"
                aria-describedby="updateUserCity" />
                @error('updateUserCity')
                    <small id="updateUserCity" class="text-danger">{{$message}}</small>
                @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Update
        </button>

    </form>
</div>
@endsection