@extends('layouts.app')

@section('title', 'お問い合わせフォーム')

@section('content')
<h2>お問い合わせフォーム</h2>
<form action="/confirm" method="POST">
    @csrf
    <div>
        <label for="firstName">姓</label>
        <input type="text" id="firstName" name="firstName" value="{{ old('firstName') }}">
        @error('firstName')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="lastName">名</label>
        <input type="text" id="lastName" name="lastName" value="{{ old('lastName') }}">
        @error('lastName')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div>{{ $message }}</div>
        @enderror
    </div>
    <!-- その他のフォームフィールド -->
    <button type="submit">確認画面へ</button>
</form>
@endsection
