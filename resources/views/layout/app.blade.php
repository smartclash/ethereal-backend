<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ethereal | KCG College of Technology</title>
        @vite('resources/css/app.sass')
    </head>
    <body>
        @stack('start')
        @include('layout.navbar')
        @yield('content')
        @include('layout.footer')
        @stack('end')
        @vite('resources/js/app.js')
    </body>
</html>
