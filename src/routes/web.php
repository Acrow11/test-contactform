<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Contact form routes
Route::get('/', [ContactController::class, 'index'])->name('contact.index');  // お問い合わせフォーム表示
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');  // 確認画面表示
Route::post('/thanks', [ContactController::class, 'send'])->name('contact.thanks');  // 送信後のサンクスページ表示

// 管理者とユーザーのルート
Route::get('/login', [AuthController::class, 'login'])->name('auth.login'); // ログインページ
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate'); // 認証処理

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register'); // 登録ページ
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.submit'); // 登録処理


Route::get('/admin', [AdminController::class, 'index'])->name('admin.index'); // 管理者ダッシュボード
// web.php
Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');
Route::post('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');

