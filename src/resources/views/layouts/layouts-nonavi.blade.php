<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/layouts.css')}}"/>
    @yield('css')
    

</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <a class="header__logo" href="/">
            Atte
            </a>
            </div>
        </div>
    </header>
    <main>
    @yield('content')
    </main>
    <footer>
        Atte,inc.
    </footer>
</body>
</html>