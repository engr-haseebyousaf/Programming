<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <x-bootstrap-cdn />
    <title>Dynamic Components</title>
</head>
<body>
    @php
        $dynamicComponent = "alerts.alert";
    @endphp
    <x-dynamic-component :component="$dynamicComponent" type="success" message="This is the dynamic message" />
</body>
</html>