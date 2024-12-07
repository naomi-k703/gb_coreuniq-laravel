<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * テーブル作成処理: users
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー（id）
            $table->foreignId('company_id') // 外部キー: 所属企業ID
                ->constrained('companies') // companiesテーブルのidを参照
                ->onDelete('cascade'); // 企業が削除されたらユーザーも削除
            $table->string('name', 255)->notNullable(); // ユーザー名（必須）
            $table->string('email', 255)->unique()->notNullable(); // メールアドレス（必須、ユニーク）
            $table->enum('role', ['管理職', '一般ユーザー']); // ユーザーの役割
            $table->timestamps(); // 作成日時 (created_at) と 更新日時 (updated_at)
        });
    }

    /**
     * テーブル削除処理
     */
    public function down(): void
    {
        Schema::dropIfExists('users'); // テーブル削除
    }
}
