<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    @vite('resources/js/app.js')
</head>

<body>
    @include('partials.header')
    <div class="container">
        <h1 class="my-4">@yield('title')</h1>
        @yield('content')
    </div>

    @yield('modal')
</body>

</html>