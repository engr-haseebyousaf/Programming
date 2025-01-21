<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade Template Syntax</title>
</head>
<body>
    <h1>Blade Template Syntax</h1>
    {{ 2 + 5 }}
    <br><br>
    {{ "Hello World, I am laravel blade template" }}
    <br><br>
    {{ "<h2>This is blade template without ! sign</h2>" }}
    <br><br>
    {!! "<h3>This is blade template with ! sign</h3>" !!}

    {{-- This is how to comment in laravel blade template syntax --}}

    @php
        $name = "Haseeb";
    @endphp
    {{ $name }}

    @php
        $fruits = ["Orange", "Mango", "Banana", "Grapes", "Guava", "Apple"];
    @endphp
    <ol>
    @foreach ($fruits as $fruit)
        @if ($loop->first)
            <li style="color: blue">{{ $fruit }}</li>
        @elseif ($loop->last)
            <li style="color: red">{{ $fruit }}</li>
        @elseif($loop->even)
            <li style="color: green">{{ $fruit }}</li>
        @elseif($loop->odd)
            <li style="color: yellow">{{ $fruit }}</li>
        @endif
        
    @endforeach
    </ol>
    {{-- To print variable name as below --}}
    @{{ $fruits }}
</body>
</html>