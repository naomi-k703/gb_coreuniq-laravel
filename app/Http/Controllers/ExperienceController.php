<?php

namespace App\Http\Controllers;

use App\Models\Experience; // Experienceモデルを使用
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    // データベースにレコードを追加するテスト用メソッド
    public function testCreate()
    {
        // データ挿入処理
        Experience::create([
            'user_id' => 1, // 仮のユーザーID
            'experience_type' => '嬉しかった', // ENUMに合致する値
            'experience_detail' => 'Laravelの勉強を頑張ったこと',
            'emotion_strength' => 4, // 感情の強さ
        ]);

        // 成功メッセージを返す
        return "レコードが追加されました！";
    }

    // データを一覧表示するメソッド
    public function index()
    {
        // experiencesテーブルから全データを取得
        $experiences = Experience::all();

        // ビューにデータを渡す
        return view('experiences.index', compact('experiences'));
    }

    // フォームを表示するメソッド
    public function create()
    {
        // experiences/create.blade.php を表示
        return view('experiences.create');
    }

    // データを保存するメソッド
    public function store(Request $request)
    {
        // 入力データのバリデーション
        $request->validate([
            'user_id' => 'required|integer',
            'experience_type' => 'required',
            'experience_detail' => 'required|string',
            'emotion_strength' => 'required|integer|min:1|max:5',
        ]);

        // データを保存
        Experience::create($request->all());

        // 一覧ページにリダイレクトし、成功メッセージを表示
        return redirect()->route('experiences.index')->with('success', 'データが追加されました！');
    }
}
