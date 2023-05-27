<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="@yield('description')">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
    @vite(['resources/css/app.css'])
    <style>

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Open Sans';
        }

        footer {
            margin-top: auto;
        }
    </style>
</head>

<body>
    @include('konsumen.layouts.navbar')
    <div class="">
        @yield('content')
    </div>
    @include('konsumen.layouts.footer')
</body>

</html>
