<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Coronashopping</title>
    </head>
    <body>
    <ul>
    @foreach ( $users as $user )
        <li> {{$user-> firstName }} {{$user-> lastName }} </li>
    @endforeach
    </ul>
    </body>
</html>
