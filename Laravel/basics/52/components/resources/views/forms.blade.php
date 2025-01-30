<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Component form without running any artisan command</title>
</head>
<body>
    <x-form action="/somefile" method="PUT">
        <input type="text" name="name" id="name">
        <input type="submit" value="submit">
    </x-form>
</body>
</html>