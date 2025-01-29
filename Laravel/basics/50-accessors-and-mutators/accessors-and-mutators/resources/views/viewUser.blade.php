@extends('layout')
@section('subtitle')
    User Detail
@endsection

@section('content')
    <div class="col-md-7 mx-auto">
        <table class="table table-bordered table-striped">
            <tr>
                <th width="80px">Name</th>
                <td>{{$userData->name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$userData->email}}</td>
            </tr>
            <tr>
                <th>Age</th>
                <td>{{$userData->age}}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{$userData->city}}</td>
            </tr>
        </table>
        <a href="{{route('user.index')}}" class="btn btn-danger">Back</a>
    </div>
@endsection