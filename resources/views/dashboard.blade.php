<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('マイページ') }}
            </h2>
            <div class="relative">
                <!-- ドロップダウンメニュー -->
                <div id="menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
                    <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                    <a href="/logout" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Log Out</a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="p-6 space-y-6">
        <!-- 挨拶部分 -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">挨拶</h3>
            <p class="text-gray-900">{{ __("こんにちは、") . Auth::user()->name . __(" さん！") }}</p>
            <p class="text-gray-900">{{ __("あなたのメールアドレス: ") . Auth::user()->email }}</p>
        </div>

        <!-- アクション & 進捗状況 -->
        <div class="flex flex-wrap gap-6 layout-row">
            <!-- アクションボタン部分 -->
            <div class="bg-white rounded-lg shadow p-6 flex-1">
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

            <!-- 進捗状況部分 -->
            <div class="bg-white rounded-lg shadow p-6 flex-1">
                <h3 class="text-lg font-semibold text-gray-800">進捗状況</h3>
                <div class="progress-container mt-4">
                    <div id="progress-bar" class="progress-bar" style="width: 90%;"></div>
                </div>
                <p class="text-sm mt-2" id="progress-text">90% 完了</p>
            </div>
        </div>

        <!-- 経験の多様性チャート & 統計データ -->
        <div class="flex flex-wrap gap-6 layout-row">
            <!-- 経験の多様性チャート部分 -->
            <div class="bg-white rounded-lg shadow p-6 flex-1">
                <h3 class="text-lg font-semibold text-gray-800">経験の多様性</h3>
                <div style="max-width: 400px; margin: 0 auto;">
                    <canvas id="experienceDiversityChart"></canvas>
                </div>
                <p class="text-gray-800 mt-4">あなたが記録した経験の割合を視覚化しています。</p>
                <ul class="list-disc pl-6 text-gray-800 mt-4">
                    <li>総経験数: {{ $totalExperiences }}</li>
                    <li>嬉しかった経験数: {{ $happyExperiences }}</li>
                    <li>嫌だった経験数: {{ $sadExperiences }}</li>
                </ul>
            </div>

            <!-- 統計データ部分 -->
            <div class="bg-white rounded-lg shadow p-6 flex-1">
                <h3 class="text-lg font-semibold text-gray-800">統計データ</h3>
                <ul class="list-disc pl-6 text-gray-800 mt-4">
                    <li>総経験数: {{ $totalExperiences }}</li>
                    <li>嬉しかった経験数: {{ $happyExperiences }}</li>
                    <li>嫌だった経験数: {{ $sadExperiences }}</li>
                </ul>
                <!-- 積み木グラフ -->
                <div style="max-width: 400px; margin: 20px auto;">
                    <canvas id="stackedBarChart"></canvas>
                </div>
            </div>

            <!-- フィードバック一覧部分 -->
            <div class="bg-white rounded-lg shadow p-6 flex-1">
                <h3 class="text-lg font-semibold text-gray-800">あなたの強み</h3>
                <p class="text-gray-600 mb-4">周囲から見たあなたの素晴らしい部分がここに表示されます。</p>
                <div class="space-y-4">
                    @foreach ($feedbacks as $feedback)
                        <div class="p-4 border border-gray-200 rounded-lg bg-gray-50 shadow-sm">
                            <p class="text-blue-700 font-bold">{{ $feedback->feedback_provider }}</p>
                            <p class="text-gray-800 mt-2">「{{ $feedback->feedback_content }}」</p>
                            <span class="text-sm text-gray-500 block mt-1">ステータス: {{ $feedback->status }}</span>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('feedback.summary') }}" class="mt-4 inline-block bg-blue-500 text-gray px-4 py-2 rounded hover:bg-blue-600">
                    全てのフィードバックを見る
                </a>
                
            </div>
        </div>

        <!-- ヘルプセクション部分 -->
        <div class="bg-white rounded-lg shadow p-6">
            <h3 class="text-lg font-semibold text-gray-800">ヘルプ</h3>
            <ul class="list-disc pl-6 text-gray-800 mt-4">
                <li><a href="/help" class="text-blue-500 hover:text-blue-600">システムの使い方</a></li>
                <li><a href="/help/faq" class="text-blue-500 hover:text-blue-600">よくある質問</a></li>
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

        .layout-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .flex-1 {
            flex: 1;
            min-width: 300px;
            max-width: 48%;
            margin: 0 auto;
        }

        canvas {
            display: block;
            max-width: 100%;
            height: auto;
            margin: 0 auto;
        }
    </style>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // 多様性チャート
        const diversityCtx = document.getElementById('experienceDiversityChart').getContext('2d');
        const diversityData = {
            labels: ['嬉しかった', '嫌だった'],
            datasets: [{
                data: [{{ $happyExperiences }}, {{ $sadExperiences }}],
                backgroundColor: ['#4caf50', '#f44336'],
            }]
        };

        new Chart(diversityCtx, {
            type: 'pie',
            data: diversityData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((sum, value) => sum + value, 0);
                                const percentage = ((context.raw / total) * 100).toFixed(1);
                                return `${context.label}: ${context.raw}件 (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        });

        // 積み木グラフ
        const stackedCtx = document.getElementById('stackedBarChart').getContext('2d');
        new Chart(stackedCtx, {
            type: 'bar',
            data: {
                labels: ['嬉しかった', '嫌だった'],
                datasets: [{
                    label: '経験の割合',
                    data: [{{ $happyExperiences }}, {{ $sadExperiences }}],
                    backgroundColor: ['#4caf50', '#f44336'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((sum, value) => sum + value, 0);
                                const percentage = ((context.raw / total) * 100).toFixed(1);
                                return `${context.label}: ${context.raw}件 (${percentage}%)`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stacked: true,
                        ticks: {
                            stepSize: 1
                        }
                    },
                    x: {
                        stacked: true
                    }
                }
            }
        });
    </script>
</x-app-layout>
