@extends('layout')
@section('subtitle')
    All Users
@endsection

@section('content')
    <div class="col-md-12 my-3">
        <a href="{{route('user.create')}}" class="btn btn-primary">Add New</a>
    </div>
    @if(session("status"))
        <div class="col-md-12">
            <div class="alert alert-success">
                {{session("status")}}
            </div>
        </div>
    @endif
    <div class="col-md-10 mx-auto">
        <table class="table table-bordered table-striped">
            <tr>
                <th>User No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>City</th>
                <th>View</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->age }}</td>
                    <td>{{ $user->city }}</td>
                    <td><a href="{{route('user.show',$user->userId)}}" class="btn btn-primary btn-sm">View</a></td>
                    <td><a href="{{route('user.edit',$user->userId)}}" class="btn btn-success btn-sm">Update</a></td>
                    <td>
                        <form action="{{route('user.destroy', $user->userId)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection