<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>FashinoablyLate</h1>
        <!-- ナビゲーションなど -->
    </header>

    <main>
        <div class="container">
            @yield('content') <!-- ここだけでコンテンツを表示 -->
        </div>
    </main>

    <footer>
        <p>© 2024 FashinoablyLate</p>
    </footer>
</body>
</html>
