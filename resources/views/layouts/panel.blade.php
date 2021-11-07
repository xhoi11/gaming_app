<!DOCTYPE html>
<html>
<head>
    @include('partials.head')
    <link href="{{ asset('assets/css/mainpage.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    @yield('afterStyles')
    {{--    We set this '@' if we want to set other codes in middle of partials.head and '@yield'--}}
</head>
<body>

<div class="page-flex">
    @include('partials.sidebar')

    <div class="main-wrapper">
        {{--Header--}}
        @include('partials.header')
                @yield('content')

        {{--Footer--}}
        @include('partials.footer')
    </div>
</div>

@include('partials.scripts')
@yield('afterScripts')

</body>
</html>
