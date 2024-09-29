<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // 名前
            $table->string('email')->unique();  // メールアドレス（重複不可）
            $table->string('password');         // パスワード
            $table->string('tel')->nullable();  // 電話番号（任意）
            $table->string('address')->nullable();  // 住所（任意）
            $table->string('building')->nullable(); // 建物名（任意）
            $table->timestamps();               // 作成日、更新日
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('my_users');
    }
}
