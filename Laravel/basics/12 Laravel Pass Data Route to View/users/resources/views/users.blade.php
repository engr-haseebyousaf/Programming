<h1>Users Names and Information</h1>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Contact</th>
            <th>Details</th>
        </tr>
    </thead>
    @foreach($users as $id => $information)
        <tr>
            <td>{{ $id }}</td>
            <td>{{ $information["name"] }}</td>
            <td>{{ $information["age"] }}</td>
            <td>{{ $information["phone"] }}</td>
            <td><a href="user/{{ $id }}">See Details</a></td>
        </tr>
    @endforeach
</table>