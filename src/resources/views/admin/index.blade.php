<!-- resources/views/admin/index.blade.php -->
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>管理画面</title>
</head>
<body>
    <h1>管理画面</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>電話番号</th>
                <th>内容</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->tel }}</td>
                    <td>{{ $contact->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
