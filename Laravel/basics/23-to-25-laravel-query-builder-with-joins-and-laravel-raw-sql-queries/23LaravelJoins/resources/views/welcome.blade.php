<h1>Students Data</h1>
@foreach($students as $key => $value)
    <h3>
        {{$value->studentId}} | 
        {{$value->name}} | 
        {{$value->email}} | 
        {{$value->studentCity}} | 
        {{$value->city}} | 
    </h3>
@endforeach