<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * テーブル作成処理: admins
     */
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー（id）
            $table->string('name', 255)->notNullable(); // 管理者名（必須）
            $table->string('email', 255)->unique()->notNullable(); // メールアドレス（ユニーク、必須）
            $table->string('password')->notNullable(); // パスワード（必須、ハッシュ化推奨）
            $table->timestamps(); // 作成日時 (created_at) と 更新日時 (updated_at)
        });
    }

    /**
     * テーブル削除処理
     */
    public function down(): void
    {
        Schema::dropIfExists('admins'); // テーブル削除
    }
}
