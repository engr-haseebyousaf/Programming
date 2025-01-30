<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Alert Components</title>
</head>
<body>
    <x-alerts.simple_alert type="danger" message="This is the new message" />

    <x-alerts.alert />

    <x-alerts.alert type="primary" message="This is alert with other parameter than default parameter" class="m-5" />

    @php
        $message = "This is the dynamic message from php source";
    @endphp

    <x-alerts.alert :message="$message" />

    <x-alerts.alert type="info" :$message />

    <x-alerts.alert type="error" />

    {{-- pass some extra attributes like saperate class and id  --}}

    <x-alerts.alert class="m-5" type="success" role="flash" id="saperateId" />

    {{-- Dismissable attribute to make alert dismissable with the help of cross button --}}

    <x-alerts.alert dismissable type="light" role="alert" id="newId" class="w-50 mt-5"/>
</body>
</html>