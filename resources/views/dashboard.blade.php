<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>

    <!-- 挨拶 -->
    <div class="p-6 text-gray-900">
        {{ __("こんにちは、") . Auth::user()->name . __(" さん！") }}
    </div>

    <div class="p-6 text-gray-900 mb-6">
        {{ __("あなたのメールアドレス: ") . Auth::user()->email }}
    </div>

    <!-- 進捗バー -->
    <div class="mt-6">
        <p>現在の進捗状況:</p>
        <div class="progress-container">
            <div id="progress-bar" class="progress-bar" style="width: 75%;"></div>
        </div>
        <p class="text-sm mt-2" id="progress-text">75% 完了</p>
    </div>

    <!-- 最近の入力 -->
    <div class="mt-6 p-4 bg-gray-100 rounded-lg shadow-sm">
        <p>最近の入力:</p>
        <ul id="recent-inputs" class="list-disc pl-6 text-gray-800">
            @foreach ($recentInputs as $input)
                <li>
                    タイプ: {{ $input->experience_type }},
                    スコア: {{ $input->emotion_strength }},
                    詳細: {{ $input->experience_detail }}
                </li>
            @endforeach
        </ul>
    </div>

    <!-- 統計データ -->
    <div class="mt-6 p-4 bg-gray-50 rounded-lg shadow-sm">
        <p>統計データ:</p>
        <ul class="list-disc pl-6 text-gray-800">
            <li>総経験数: {{ $totalExperiences }}</li>
            <li>嬉しかった経験数: {{ $happyExperiences }}</li>
            <li>嫌だった経験数: {{ $sadExperiences }}</li>
        </ul>
    </div>

    <!-- ヘルプリンク -->
    <div class="mt-6">
        <a href="/help" class="text-blue-500 hover:text-blue-600 underline">
            システムの使い方を見る
        </a>
    </div>

    <!-- セクション内リンク -->
    <div class="mt-6 space-y-4">
        <a href="{{ route('experiences.create') }}" class="bg-blue-500 hover:bg-blue-600 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition duration-200">
            経験を入力する
        </a>
        <a href="{{ route('experiences.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition duration-200">
            経験を一覧表示する
        </a>
        <a href="{{ route('experiences.edit', ['id' => 1]) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition duration-200">
            経験を更新する
        </a>
    </div>

    <!-- 外部リンク一覧 -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ようこそ！") }}
                </div>

                <div class="mt-6">
                    <a href="/profile" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-sm transition duration-200">
                        プロフィールを編集
                    </a>
                </div>

                <div class="mt-6 space-y-2">
                    <ul class="list-none">
                        <li><a href="{{ route('experiences.create') }}" class="text-blue-500 hover:text-blue-600">経験を入力する</a></li>
                        <li><a href="{{ route('experiences.index') }}" class="text-blue-500 hover:text-blue-600">経験を一覧表示する</a></li>
                        <li><a href="{{ route('experiences.edit', ['id' => 1]) }}" class="text-blue-500 hover:text-blue-600">経験を更新する</a></li>
                        <li><a href="/tasks" class="text-blue-500 hover:text-blue-600">タスク管理</a></li>
                        <li><a href="/settings" class="text-blue-500 hover:text-blue-600">設定</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- フッター -->
    <footer class="bg-gray-800 text-white py-4 mt-12 text-center">
        &copy; {{ date('Y') }} My Application. All rights reserved.
    </footer>

    <!-- CSS -->
    <style>
        .progress-container {
            width: 100%;
            background-color: #f0f0f0;
            border-radius: 12px;
            height: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            height: 100%;
            border-radius: 12px;
            background: linear-gradient(90deg, #4caf50, #81c784);
            transition: width 0.5s ease-in-out;
        }
    </style>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // 進捗バーの変更
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');
            const newProgress = 90; // 進捗を90%に変更
            progressBar.style.width = `${newProgress}%`;
            progressText.textContent = `${newProgress}% 完了`;

            // 最近の入力を更新
            const recentInputsList = document.getElementById('recent-inputs');
            const recentInputs = [
                { type: "楽しかった", score: 5, detail: "新しいスキルを学んだ" },
                { type: "嬉しかった", score: 4, detail: "チームから感謝された" }
            ];
            recentInputsList.innerHTML = '';
            recentInputs.forEach(input => {
                const li = document.createElement('li');
                li.textContent = `タイプ: ${input.type}, スコア: ${input.score}, 詳細: ${input.detail}`;
                recentInputsList.appendChild(li);
            });

            // タスクリストを更新
            const taskList = document.getElementById('task-list');
            const tasks = ['新しい経験を記録する', '目標を確認する', 'チームに感謝を伝える'];
            taskList.innerHTML = '';
            tasks.forEach(task => {
                const li = document.createElement('li');
                li.textContent = task;
                taskList.appendChild(li);
            });
        });
    </script>
</x-app-layout>
