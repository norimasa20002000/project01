<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <link href="/css/styles.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>@yield('title')</h1>
        @yield('content')
        <footer>
            @yield('footer')
        </footer>
    </div>
</body>

</html>