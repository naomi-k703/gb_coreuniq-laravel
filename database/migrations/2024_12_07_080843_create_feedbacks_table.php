<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * テーブル作成処理: feedbacks
     */
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー (id)
            $table->foreignId('user_id') // 外部キー: フィードバック対象者ID
                ->constrained('users') // usersテーブルのidを参照
                ->onDelete('cascade'); // ユーザーが削除されたらフィードバックも削除
            $table->string('feedback_provider', 255)->notNullable(); // フィードバック提供者（メール）
            $table->text('feedback_content')->notNullable(); // フィードバック内容（必須）
            $table->timestamps(); // 作成日時 (created_at) と 更新日時 (updated_at)
        });
    }

    /**
     * テーブル削除処理
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks'); // テーブル削除
    }
}
