<!-- resources/views/contact/confirm.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>確認画面</title>
</head>
<body>
    @extends('layouts.app')

@section('title', '確認画面')

@section('content')

    <h1>確認画面</h1>

    <p>お名前: {{ $validated['name'] }}</p>
    <p>メールアドレス: {{ $validated['email'] }}</p>
    <p>電話番号: {{ $validated['tel'] ?? '未入力' }}</p>
    <p>住所: {{ $validated['address'] ?? '未入力' }}</p>
    <p>建物名: {{ $validated['building'] ?? '未入力' }}</p>
    <p>お問い合わせの種類: {{ $validated['type'] }}</p>
    <p>お問い合わせの内容: {{ $validated['message'] }}</p>

    <form action="{{ route('contact.thanks') }}" method="POST">
        @csrf  <!-- CSRF対策 -->
        <button type="submit">送信</button>
    </form>

    <a href="{{ route('contact.index') }}">戻る</a>
</body>
</html>
