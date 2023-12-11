<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

</head>

<title>@yield('title')</title>

@include('layouts.partials.style')

<body>

    <div id="error">
        @yield('content')
    </div>

    @include('layouts.partials.script')

</body>

</html>