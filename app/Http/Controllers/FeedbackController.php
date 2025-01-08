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
            'feedback_provider' => 'required|string|max:255', // 提供者
            'feedback_content' => 'required|string', // 内容
        ]);

        // データベースに保存
        Feedback::create([
            'user_id' => auth()->id(),
            'feedback_provider' => $validated['feedback_provider'],
            'feedback_content' => $validated['feedback_content'],
            'status' => 'pending',
        ]);

        return redirect()->route('feedback.create')->with('success', 'フィードバックが送信されました！');
    }

    // フィードバックサマリー表示
    public function summary()
    {
        // 現在の認証ユーザーのフィードバックを取得
        $feedbacks = Feedback::where('user_id', auth()->id())->get();

        return view('feedback.summary', compact('feedbacks'));
    }

    // フィードバック一覧表示
    public function index()
    {
        // 認証ユーザーのフィードバック一覧を取得
        $feedbacks = Feedback::where('user_id', auth()->id())->get();

        return view('feedback.index', compact('feedbacks'));
    }
}

