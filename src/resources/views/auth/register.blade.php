<body>
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="container">
        <h1 class="title">ユーザー登録</h1>

        <form action="{{ route('auth.register.submit') }}" method="POST" class="register-form">
            @csrf

            <!-- お名前 -->
            <div class="form-group">
                <label for="name">お名前:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- メールアドレス -->
            <div class="form-group">
                <label for="email">メールアドレス:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- パスワード -->
            <div class="form-group">
                <label for="password">パスワード:</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- パスワード確認 -->
            <div class="form-group">
                <label for="password_confirmation">パスワード確認:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn">登録</button>
        </form>

        <a href="{{ route('auth.login') }}">ログイン</a>
    </div>
</body>
