<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (Request::path() === 'dashboard')
        <title>Dashboard | StayMinute</title>
    @endif
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    @include('Hotel.includes.navbar')
    {{-- @include('Hotel.includes.sidebar') --}}
    <div>
        @yield('page')
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>