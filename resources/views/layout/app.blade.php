<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ethereal | KCG College of Technology</title>
        @vite(['resources/css/app.sass', 'resources/js/app.js'])
    </head>
    <body>
        @stack('start')
        @yield('content')
        @stack('end')
    </body>
</html>
