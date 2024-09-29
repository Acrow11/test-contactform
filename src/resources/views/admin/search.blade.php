@extends('layouts.app')

@section('content')
<h1>管理画面</h1>

<script>
        // モーダルを表示するための関数
        function openModal(details) {
            document.getElementById('modal-details').innerHTML = details;
            document.getElementById('detail-modal').style.display = 'block';
        }

        // モーダルを閉じる関数
        function closeModal() {
            document.getElementById('detail-modal').style.display = 'none';
        }

        // モーダルのクローズボタンのイベントリスナー
        document.querySelector('.close-button').addEventListener('click', closeModal);

        // 詳細ボタンにイベントリスナーを追加
        document.querySelectorAll('.detail-button').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');

                // Ajaxリクエストで詳細情報を取得
                fetch(`/admin/contact/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        openModal(`
                            <p>名前: ${data.name}</p>
                            <p>メール: ${data.email}</p>
                            <p>性別: ${data.gender}</p>
                            <p>お問い合わせ種類: ${data.contact_type}</p>
                            <p>メッセージ: ${data.message}</p>
                            <p>日付: ${data.created_at}</p>
                        `);
                    })
                    .catch(error => console.error('Error fetching details:', error));
            });
        });
    </script>


<form action="{{ route('admin.search') }}" method="GET">
    <label for="name">名前:</label>
    <input type="text" id="name" name="name">
    
    <label for="email">メールアドレス:</label>
    <input type="email" id="email" name="email">

    <label for="gender">性別:</label>
    <select id="gender" name="gender">
        <option value="全て">全て</option>
        <option value="男性">男性</option>
        <option value="女性">女性</option>
        <option value="その他">その他</option>
    </select>

    <label for="contact_type">お問い合わせ種類:</label>
    <input type="text" id="contact_type" name="contact_type">

    <label for="date">日付:</label>
    <input type="date" id="date" name="date">

    <button type="submit">検索</button>
    <button type="reset">リセット</button>
</form>

@if($contacts->count())
    <table>
        <thead>
            <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>性別</th>
                <th>お問い合わせ種類</th>
                <th>日付</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->gender }}</td>
                <td>{{ $contact->contact_type }}</td>
                <td>{{ $contact->created_at }}</td>
                <td>
                    <button data-id="{{ $contact->id }}" class="detail-button">詳細</button>
                    <form action="{{ route('admin.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contacts->links() }} <!-- ページネーション -->
@else
    <p>該当するデータはありません。</p>
@endif

<!-- モーダルウィンドウ -->
<!-- モーダルウィンドウ -->
<div id="detail-modal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>詳細情報</h2>
        <div id="modal-details">
            <!-- 詳細情報がここに表示される -->
        </div>
    </div>
</div>

@endsection
