<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * テーブル作成処理: experiences
     */
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー（id）
            $table->foreignId('user_id') // 外部キー: ユーザーID
                ->constrained('users') // usersテーブルのidを参照
                ->onDelete('cascade'); // ユーザーが削除されたら経験も削除
            $table->enum('experience_type', ['嬉しかった', '嫌だった']); // 経験タイプ
            $table->text('experience_detail')->notNullable(); // 経験の詳細（必須）
            $table->integer('emotion_strength') // 感情の強さ (1-5)
                ->check('emotion_strength BETWEEN 1 AND 5'); // 値の範囲チェック
            $table->timestamps(); // 作成日時 (created_at) と 更新日時 (updated_at)
        });
    }

    /**
     * テーブル削除処理
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences'); // テーブル削除
    }
}
