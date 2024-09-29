<!-- resources/views/contact/thanks.blade.php -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>送信完了</title>
</head>
<body>
    <h1>送信完了</h1>
    <p>お問い合わせありがとうございました。</p>
    <a href="{{ route('contact.index') }}">戻る</a>
</body>
</html>
