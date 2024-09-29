<!-- resources/views/contact/index.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>お問い合わせフォーム</title>
</head>
<body>
    @extends('layouts.app')

    @section('title', 'お問い合わせフォーム')

    @section('content') <!-- ここからコンテンツの開始 -->
        <h1>お問い合わせフォーム</h1>

        <form action="{{ route('contact.confirm') }}" method="POST">
            @csrf  <!-- CSRF対策 -->
            
            <!-- 名前 -->
            <label for="name">お名前:</label>
            <input type="text" id="name" name="name" required><br>

            <!-- メールアドレス -->
            <label for="email">メールアドレス:</label>
            <input type="email" id="email" name="email" required><br>

            <!-- 電話番号 -->
            <label for="tel">電話番号:</label>
            <input type="text" id="tel" name="tel"><br>

            <!-- 住所 -->
            <label for="address">住所:</label>
            <input type="text" id="address" name="address"><br>

            <!-- 建物名 -->
            <label for="building">建物名:</label>
            <input type="text" id="building" name="building"><br>

            <!-- お問い合わせの種類 -->
            <label for="type">お問い合わせの種類:</label>
            <select id="type" name="type">
                <option value="general">一般</option>
                <option value="support">サポート</option>
                <option value="sales">営業</option>
            </select><br>

            <!-- お問い合わせの内容 -->
            <label for="message">お問い合わせの内容:</label>
            <textarea id="message" name="message" required></textarea><br>

            <button type="submit">確認画面へ</button>
        </form>
    @endsection <!-- ここでコンテンツの終了 -->
</body>
</html>
