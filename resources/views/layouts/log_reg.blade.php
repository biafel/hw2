<html>
    <head>
        <link rel='stylesheet' href="{{asset('css/stile.css')}}"/>
        @yield('script');
    </head>
    <body>
        <main>
            <form method='post'>
                @yield('info');
            </form>
        </main>
    </body>
</html>
