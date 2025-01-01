<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // データベースに保存可能なカラムを指定
    protected $fillable = [
        'user_id',
        'feedback_provider',
        'feedback_content',
        'status',
    ];
}
