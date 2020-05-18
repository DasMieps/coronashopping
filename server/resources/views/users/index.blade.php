<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coronashopping User</title>
</head>
<body>
<ul>
    @foreach ($users as $user)
        <li><a href="users/{{$user->id}}">
        {{$user->firstName}}</a></li>
    @endforeach
</ul>
</body>
</html>