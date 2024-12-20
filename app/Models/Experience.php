<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    // テーブルに保存可能なカラムを指定
    protected $fillable = [
        'user_id',           // ユーザーID
        'experience_type',   // 経験タイプ
        'experience_detail', // 経験の詳細
        'emotion_strength'   // 感情の強さ
    ];
}
