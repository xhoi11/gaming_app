<!DOCTYPE html>
<html>
<head>
    @include('partials.head')
    @yield('afterStyles')
</head>
<body>
@include('partials.header')
@include('partials.sidebar')
<div class="container mt-4">
    @yield('content')
</div>

@include('partials.footer')
</body>
</html>
