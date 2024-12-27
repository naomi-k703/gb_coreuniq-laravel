<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::all();
        return view('experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('experiences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'experience_type' => 'required|in:嬉しかった,嫌だった',
            'experience_detail' => 'required|string',
            'emotion_strength' => 'required|integer|min:1|max:5',
        ]);

        Experience::create($request->all());
        return redirect()->route('experiences.index')->with('success', __('データが追加されました！'));
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

    public function testCreate()
    {
        Experience::create([
            'user_id' => 1,
            'experience_type' => '嬉しかった',
            'experience_detail' => 'Laravelの勉強を頑張ったこと',
            'emotion_strength' => 4,
        ]);
        return "レコードが追加されました！";
    }
}
