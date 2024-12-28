<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function handleRequest(Request $request)
    {
        if ($request->isMethod('get')) {
            // GETリクエスト: フォームを表示
            return view('experiences.create');
        } elseif ($request->isMethod('post')) {
            // POSTリクエスト: データを保存
            $request->validate([
                'user_id' => 'required|integer',
                'experience_type.*' => 'required|in:嬉しかった,嫌だった',
                'experience_detail.*' => 'required|string',
                'emotion_strength.*' => 'required|integer|min:1|max:5',
            ]);

            $createdExperiences = [];
            foreach ($request->experience_type as $index => $type) {
                $createdExperiences[] = Experience::create([
                    'user_id' => $request->user_id,
                    'experience_type' => $type,
                    'experience_detail' => $request->experience_detail[$index],
                    'emotion_strength' => $request->emotion_strength[$index],
                ]);
            }

            // 保存後に結果画面を表示
            return view('experiences.result', compact('createdExperiences'));
        }

        // その他のHTTPメソッドは405エラー
        abort(405, 'Method Not Allowed');
    }

    // 既存のインデックスページや編集、削除用のメソッドも残しておく
    public function index()
    {
        $experiences = Experience::all();
        return view('experiences.index', compact('experiences'));
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        return view('experiences.edit', compact('experience'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'experience_type' => 'required|in:嬉しかった,嫌だった',
            'experience_detail' => 'required|string',
            'emotion_strength' => 'required|integer|min:1|max:5',
        ]);

        $experience = Experience::findOrFail($id);
        $experience->update($request->all());
        return redirect()->route('experiences.index')->with('success', __('データが更新されました！'));
    }

    public function destroy($id)
    {
        $experience = Experience::findOrFail($id);
        $experience->delete();
        return redirect()->route('experiences.index')->with('success', __('データが削除されました！'));
    }
}
