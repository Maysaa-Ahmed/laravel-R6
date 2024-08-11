<!doctype html>
<html lang="en">
@include('includes.head')
    <body>
    @include('includes.preloader')
        <main>
            @include('includes.nav')

            @yield('content')

            @include('includes.footer')
            @include('includes.footerJs')

        </main>
    </body>
</html>