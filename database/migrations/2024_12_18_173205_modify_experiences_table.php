<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('experiences', function (Blueprint $table) {
            // 新しいカラムを追加する場合
            $table->string('type')->nullable()->change(); // 既存カラムを変更
            $table->string('new_column')->nullable(); // 新しいカラム追加
        });
    }

    public function down()
    {
        Schema::table('experiences', function (Blueprint $table) {
            // 変更を元に戻す処理
            $table->string('type')->change();
            $table->dropColumn('new_column'); // 追加したカラムを削除
        });
    }
};
