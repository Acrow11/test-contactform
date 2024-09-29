<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // バリデーションルールを定義
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // バリデーションエラーがあれば戻る
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // ユーザーの登録
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 登録後、ログイン画面へリダイレクト
        return redirect()->route('auth.login');
    }

    // ログイン画面を表示するメソッド
    public function login()
    {
        return view('auth.login'); // ログインページのビューを返す
    }

    // ユーザーを認証するメソッド
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin'); // 認証後のリダイレクト先
        }

        return back()->withErrors([
            'email' => 'メールアドレスまたはパスワードが間違っています。',
        ]);
    }
}
