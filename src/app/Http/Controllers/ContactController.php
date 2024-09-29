<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // お問い合わせフォームの表示
    public function index()
    {
        return view('contact.index');
    }

    // 確認画面の表示
    // app/Http/Controllers/ContactController.php

public function confirm(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email',
        'tel' => 'nullable|regex:/^[0-9\-]+$/',  // 電話番号のフォーマット
        'address' => 'nullable|string|max:255',
        'building' => 'nullable|string|max:255',
        'type' => 'required|in:general,support,sales',  // お問い合わせの種類
        'message' => 'required',
    ]);

    return view('contact.confirm', compact('validated'));
}


    // メッセージ送信完了画面の表示
    public function send(Request $request)
    {
        // ここでメール送信処理を追加することができます。
        return view('contact.thanks');
    }
}
