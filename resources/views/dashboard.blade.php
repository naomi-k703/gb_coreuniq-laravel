<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>

    <div class="p-6 space-y-6">
        <!-- 挨拶 -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">挨拶</h3>
            <p class="text-gray-900">{{ __("こんにちは、") . Auth::user()->name . __(" さん！") }}</p>
            <p class="text-gray-900">{{ __("あなたのメールアドレス: ") . Auth::user()->email }}</p>
        </div>

        <!-- 進捗状況 -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">進捗状況</h3>
            <div class="progress-container mt-4">
                <div id="progress-bar" class="progress-bar" style="width: 90%;"></div>
            </div>
            <p class="text-sm mt-2" id="progress-text">90% 完了</p>
        </div>

        <!-- アクションボタン -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">アクション</h3>
            <div class="flex flex-wrap gap-4 mt-4">
                <a href="{{ route('experiences.create') }}" class="bg-blue-500 hover:bg-blue-600 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm">
                    経験を入力する
                </a>
                <a href="{{ route('experiences.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm">
                    経験を一覧表示する
                </a>
                <a href="{{ route('experiences.edit', ['id' => 1]) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm">
                    経験を更新する
                </a>
            </div>
        </div>

        <!-- 最近の入力 -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">最近の入力</h3>
            <ul id="recent-inputs" class="list-disc pl-6 text-gray-800 mt-4">
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
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">統計データ</h3>
            <ul class="list-disc pl-6 text-gray-800 mt-4">
                <li>総経験数: {{ $totalExperiences }}</li>
                <li>嬉しかった経験数: {{ $happyExperiences }}</li>
                <li>嫌だった経験数: {{ $sadExperiences }}</li>
            </ul>
        </div>

        <!-- ヘルプセクション -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">ヘルプ</h3>
            <ul class="list-disc pl-6 text-gray-800 mt-4">
                <li><a href="/help" class="text-blue-500 hover:text-blue-600">システムの使い方</a></li>
                <li><a href="/faq" class="text-blue-500 hover:text-blue-600">よくある質問</a></li>
            </ul>
        </div>
    </div>

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
</x-app-layout>
