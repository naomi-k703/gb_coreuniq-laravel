<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Feedback; // フィードバックモデルを追加
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    // リクエストを処理
    public function handleRequest(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('experiences.create'); // GETリクエストの場合
        } elseif ($request->isMethod('post')) {
            $request->validate([
                'user_id' => 'required|integer',
                'age.*' => 'required|integer|min:0|max:120', // 年齢のバリデーションを追加
                'experience_type.*' => 'required|in:嬉しかった,嫌だった',
                'experience_detail.*' => 'required|string',
                'emotion_strength.*' => 'required|integer|min:1|max:5',
            ]);

            $createdExperiences = [];
            foreach ($request->experience_type as $index => $type) {
                $createdExperiences[] = Experience::create([
                    'user_id' => $request->user_id,
                    'age' => $request->age[$index], // 年齢を保存
                    'experience_type' => $type,
                    'experience_detail' => $request->experience_detail[$index],
                    'emotion_strength' => $request->emotion_strength[$index],
                ]);
            }

            return view('experiences.result', compact('createdExperiences'));
        }

        abort(405, 'Method Not Allowed');
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

    // 新しい経験を保存するメソッド
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'age' => 'required|array',
            'experience_type' => 'required|array',
            'experience_detail' => 'required|array',
            'emotion_strength' => 'required|array',
            'age.*' => 'required|integer|min:0|max:120', // 年齢のバリデーションを追加
            'experience_type.*' => 'required|in:嬉しかった,嫌だった',
            'experience_detail.*' => 'required|string|max:255',
            'emotion_strength.*' => 'required|integer|min:1|max:5',
        ]);

        foreach ($request->experience_type as $index => $type) {
            Experience::create([
                'user_id' => $request->user_id,
                'age' => $request->age[$index], // 年齢を保存
                'experience_type' => $type,
                'experience_detail' => $request->experience_detail[$index],
                'emotion_strength' => $request->emotion_strength[$index],
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
            'age' => 'required|integer|min:0|max:120', // 年齢のバリデーションを追加
            'experience_type' => 'required|in:嬉しかった,嫌だった',
            'experience_detail' => 'required|string',
            'emotion_strength' => 'required|integer|min:1|max:5',
        ]);

        $experience = Experience::findOrFail($id);
        $experience->update([
            'user_id' => $request->user_id,
            'age' => $request->age, // 年齢を更新
            'experience_type' => $request->experience_type,
            'experience_detail' => $request->experience_detail,
            'emotion_strength' => $request->emotion_strength,
        ]);

        return redirect()->route('experiences.index')->with('success', 'データが更新されました！');
    }

    // 経験を削除する
    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', 'データが削除されました！');
    }

    // ダッシュボード用のデータを準備して表示
    public function dashboard()
    {
        // 最近の経験データ（最新5件）
        $recentInputs = Experience::latest()->take(5)->get();

        // 統計データ
        $totalExperiences = Experience::count(); // 総経験数
        $happyExperiences = Experience::where('experience_type', '嬉しかった')->count(); // 嬉しかった数
        $sadExperiences = Experience::where('experience_type', '嫌だった')->count(); // 嫌だった数

        // フィードバックデータを取得（最新5件）【追記部分】
        $feedbacks = Feedback::latest()->take(5)->get();

        // ダッシュボードビューにデータを渡す
        return view('dashboard', compact(
            'recentInputs',           // 最近の経験データ
            'totalExperiences',       // 統計データ: 総経験数
            'happyExperiences',       // 統計データ: 嬉しかった数
            'sadExperiences',         // 統計データ: 嫌だった数
            'feedbacks'               // フィードバックデータ【追記】
        ));
    }

    // 感情曲線を表示するメソッド
    public function chart()
    {
        // 必要なデータ（id, emotion_strength, experience_detail）を取得
        $experiences = Experience::select('id', 'emotion_strength', 'experience_detail')->get();

        // ビューにデータを渡す
        return view('experiences.chart', compact('experiences'));
    }
}
