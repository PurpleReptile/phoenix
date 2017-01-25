@include('partials._head')

    <body>

        @include('partials._nav')

        @yield('content')

        @include('partials._footer')

        @include('partials._javascript')
    </body>
</html>