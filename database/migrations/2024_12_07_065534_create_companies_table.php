<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * テーブル作成処理: companies
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // 自動増分の主キー（id）
            $table->string('name', 255)->notNullable(); // 企業名（必須）
            $table->string('industry', 255)->nullable(); // 業種（任意）
            $table->enum('contract_plan', ['Basic', 'Standard', 'Premium']); // 契約プラン
            $table->date('contract_start')->notNullable(); // 契約開始日（必須）
            $table->date('contract_end')->nullable(); // 契約終了日（任意）
            $table->timestamps(); // 作成日時 (created_at) と 更新日時 (updated_at)
        });
    }

    /**
     * テーブル削除処理
     */
    public function down(): void
    {
        Schema::dropIfExists('companies'); // テーブル削除
    }
}
