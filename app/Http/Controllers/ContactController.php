<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // ビューに渡すデータを定義
        $data = [
            'title' => 'お問い合わせページ',
            'description' => 'お問い合わせはこちらからどうぞ。'
        ];

        // contactというビューにデータを渡して表示する
        return view('contact', $data);
    }
}


