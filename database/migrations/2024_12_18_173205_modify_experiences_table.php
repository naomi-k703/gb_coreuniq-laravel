<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->string('new_column')->nullable(); // 必要に応じて新しいカラムを追加
        });
    }

    public function down()
    {
        Schema::table('experiences', function (Blueprint $table) {
            $table->dropColumn('new_column'); // 新しいカラムを削除
        });
    }
};
