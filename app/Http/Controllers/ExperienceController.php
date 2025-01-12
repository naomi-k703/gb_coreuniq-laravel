<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExperienceController extends Controller
{
    // ダッシュボード用のデータを準備して表示
    public function dashboard()
    {
        // 最近の経験データ（最新5件）
        $recentInputs = Experience::latest()->take(5)->get();

        // 統計データ
        $totalExperiences = Experience::count();
        $happyExperiences = Experience::where('experience_type', '嬉しかった')->count();
        $sadExperiences = Experience::where('experience_type', '嫌だった')->count();

        // フィードバックデータ（最新5件）
        $feedbacks = Feedback::latest()->take(5)->get();

        // ダッシュボードビューにデータを渡す
        return view('dashboard', compact(
            'recentInputs',       // 最近の経験データ
            'totalExperiences',   // 総経験数
            'happyExperiences',   // 嬉しかった数
            'sadExperiences',     // 嫌だった数
            'feedbacks'           // フィードバックデータ
        ));
    }

    // 新しい経験を作成する画面を表示
    public function create()
    {
        return view('experiences.create');
    }

    // 経験の一覧を表示
    public function index()
    {
        $experiences = Experience::all();
        return view('experiences.index', compact('experiences'));
    }


     // ここでフォームから送信されたデータを確認します
        // 追加するコード:
        // リクエスト内容を表示して、フォームのデータが正しく送信されているか確認
        //dd("debug"); // 送信されたデータをブラウザに表示して止める
        // echo "ここまできた";
        // return "success";
        // exit();



    // 新しい経験を保存する
    public function store(Request $request)
{
    // バリデーション：フォームから送信されたデータを確認
    /*
    $validatedData = $request->validate([
        'user_id' => 'required|integer', // ユーザーIDが整数で必須
        'age.*' => 'required|integer|min:0|max:120', // 年齢が0-120の範囲で必須
        'experience_type.*' => 'required|in:嬉しかった,嫌だった', // 経験タイプが指定値内で必須
        'experience_detail.*' => 'required|string|max:255', // 詳細が文字列で必須
        'emotion_strength.*' => 'required|integer|min:1|max:5', // 感情強度が1-5の範囲で必須
    ]);
    */

    // データ保存処理
    foreach ($request->experience_type as $index => $type) {
        Experience::create([
            'user_id' => Auth::id(), // ログイン中のユーザーIDを自動設定
            'age' => $request->age[$index], // 年齢
            'experience_type' => $type, // 経験タイプ
            'experience_detail' => $request->experience_detail[$index], // 経験詳細
            'emotion_strength' => $request->emotion_strength[$index], // 感情強度
        ]);
    }

    return redirect()->route('experiences.index')->with('success', '経験が保存されました！');
}


    // 経験を編集する画面を表示
    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        return view('experiences.edit', compact('experience'));
    }

    // 経験を更新する
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'age' => 'required|integer|min:0|max:120',
            'experience_type' => 'required|in:嬉しかった,嫌だった',
            'experience_detail' => 'required|string|max:255',
            'emotion_strength' => 'required|integer|min:1|max:5',
        ]);

        $experience = Experience::findOrFail($id);
        $experience->update([
            'user_id' => $request->user_id,
            'age' => $request->age,
            'experience_type' => $request->experience_type,
            'experience_detail' => $request->experience_detail,
            'emotion_strength' => $request->emotion_strength,
        ]);

        return redirect()->route('experiences.index')->with('success', '経験が更新されました！');
    }

    // 経験を削除する
    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', '経験が削除されました！');
    }

    // 感情曲線を表示する
    public function chart()
    {
        $experiences = Experience::select('id', 'emotion_strength', 'experience_detail')->get();
        return view('experiences.chart', compact('experiences'));
    }
}
