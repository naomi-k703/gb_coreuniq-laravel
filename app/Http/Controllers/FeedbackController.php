<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    // フォーム表示
    public function create()
    {
        return view('feedback.create');
    }

    // フィードバックの保存
    public function store(Request $request)
    {
        // バリデーション（入力チェック）
        $validated = $request->validate([
            'feedback_provider' => 'required|string|max:255', // 何でも入力可能な文字列
            'feedback_content' => 'required|string', // 必須
        ]);

        // データベースに保存
        Feedback::create([
            'user_id' => auth()->id(), // 認証中のユーザーID
            'feedback_provider' => $validated['feedback_provider'], // 入力された提供者
            'feedback_content' => $validated['feedback_content'], // 入力された内容
            'status' => 'pending', // 初期状態
        ]);

        // フィードバック送信後、新しいフィードバック作成ページに戻る
        return redirect()->route('feedback.create')->with('success', 'フィードバックが送信されました！');
    }

    // フィードバックサマリー表示
    public function summary()
    {
        // 現在の認証ユーザーのフィードバックを取得
        $feedbacks = Feedback::where('user_id', auth()->id())->get();

        // summary.blade.php にデータを渡す
        return view('feedback.summary', compact('feedbacks'));
    }
}


