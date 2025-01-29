@extends('layout')
@section('subtitle')
Add User
@endsection

@section('content')
<div class="col-md-7 mx-auto">
    <form action="{{route('user.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="addUserName" class="form-label">Name</label>
            <input type="text" name="addUserName" id="addUserName" class="form-control" placeholder="User Name"
                aria-describedby="addUserName" />
            <small id="addUserName" class="text-danger">Help text</small>
        </div>
        <div class="mb-3">
            <label for="addUserEmail" class="form-label">Email</label>
            <input type="text" name="addUserEmail" id="addUserEmail" class="form-control" placeholder="User Email"
                aria-describedby="addUserEmail" />
            <small id="addUserEmail" class="text-danger">Help text</small>
        </div>
        <div class="mb-3">
            <label for="addUserAge" class="form-label">Age</label>
            <input type="number" min="18" name="addUserAge" id="addUserAge" class="form-control"
                placeholder="User Age" aria-describedby="addUserAge" />
            <small id="addUserAge" class="text-danger">Help text</small>
        </div>
        <div class="mb-3">
            <label for="addUserCity" class="form-label">City</label>
            <input type="text" name="addUserCity" id="addUserCity" class="form-control" placeholder="User City"
                aria-describedby="addUserCity" />
            <small id="addUserCity" class="text-danger">Help text</small>
        </div>
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
        <a href="{{route('user.index')}}" class="btn btn-danger">Back</a>
    </form>
</div>
@endsection