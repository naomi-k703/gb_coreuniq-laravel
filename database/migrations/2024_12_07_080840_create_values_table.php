<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuesTable extends Migration
{
    /**
     * テーブル作成処理: values
     */
    public function up(): void
    {
        Schema::create('values', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー (id)
            $table->foreignId('user_id') // 外部キー: ユーザーID
                ->constrained('users') // usersテーブルのidを参照
                ->onDelete('cascade'); // ユーザーが削除されたら価値観も削除
            $table->string('core_value', 255)->notNullable(); // 選択された価値観（必須）
            $table->text('action_criteria')->notNullable(); // 行動基準（必須）
            $table->timestamps(); // 作成日時 (created_at) と 更新日時 (updated_at)
        });
    }

    /**
     * テーブル削除処理
     */
    public function down(): void
    {
        Schema::dropIfExists('values'); // テーブル削除
    }
}
