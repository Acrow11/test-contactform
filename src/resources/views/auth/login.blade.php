<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <h1>ログイン</h1>

    <form action="{{ route('auth.authenticate') }}" method="POST"> <!-- ルート名を修正 -->
        @csrf  <!-- CSRF対策 -->

        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">ログイン</button>
    </form>

    <a href="{{ route('auth.register') }}">ユーザー登録</a> <!-- ルート名を修正 -->
</body>
</html>
