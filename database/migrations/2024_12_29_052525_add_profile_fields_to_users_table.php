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
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_image_url')->nullable(); // プロフィール画像のURL
            $table->string('role')->nullable(); // ユーザーの役職
            $table->timestamp('last_login_at')->nullable(); // 最終ログイン日時
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['profile_image_url', 'role', 'last_login_at']);
        });
    }
};
