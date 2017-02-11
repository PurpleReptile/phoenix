<!DOCTYPE html>
<html lang="ru">
    <head>
        @include('partials._head')
    </head>

    <body>
        @include('partials._nav')

        <div class="center_div">

            @include('partials._messages')

            {{-- {{ Auth::check() ? "Logged In" : "Logged Out" }} --}}

            @yield('content')

        </div>

        @include('partials._footer')

        @include('partials._javascript')

        @yield('scripts')
    </body>

</html>