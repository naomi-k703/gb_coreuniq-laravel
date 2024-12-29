<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            // カラムが存在しない場合のみ追加
            if (!Schema::hasColumn('experiences', 'experience_detail')) {
                $table->text('experience_detail')->nullable()->after('emotion_strength');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experiences', function (Blueprint $table) {
            // カラムが存在する場合のみ削除
            if (Schema::hasColumn('experiences', 'experience_detail')) {
                $table->dropColumn('experience_detail');
            }
        });
    }
};
