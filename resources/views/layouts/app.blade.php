<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard @if ($__env->yieldContent('pageTitle')) | @yield('pageTitle') @endif</title>

    @include('layouts.style.style')
</head>

<body>

    @yield('content')
    @include('layouts.footer.footer')

</body>

 @include('layouts.script.script')

</html>
