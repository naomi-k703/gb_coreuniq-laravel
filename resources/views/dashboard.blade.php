<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            
            <div class="p-6 space-y-6">
                <!-- 1段目: 左側 - 挨拶、右側 - ヘルプ -->
<div class="flex flex-wrap gap-6 layout-row">
    <div class="bg-white rounded-lg shadow p-6 flex-1">
        <h3 class="text-lg font-semibold text-gray-800">挨拶</h3>
        <p class="text-gray-900">{{ __("こんにちは、") . Auth::user()->name . __(" さん！") }}</p>
        <p class="text-gray-900">{{ __("あなたのメールアドレス: ") . Auth::user()->email }}</p>
        <h3 class="text-lg font-semibold text-gray-800">下記アクションステップの流れで実施していきましょう</h3>
    </div>

    

    <!-- 統計データ部分 -->
    <div class="bg-white rounded-lg shadow p-6 flex-1">
        <h3 class="text-lg font-semibold text-gray-800">最近の活動</h3>
        <ul class="list-disc pl-6 text-gray-800 mt-4">

            <div class="bg-white rounded-lg shadow p-6">
                
                <ul class="list-disc pl-6 text-gray-800 mt-4">
                    <li>自己発見ステップを完了しました</li>
                    <li>3件のフィードバックを受け取りました</li>
                    <li>新しいサイクルを開始しました</li>
                </ul>
            </div>
            


            {{-- <li>総経験数: {{ $totalExperiences }}</li>
            <li>嬉しかった経験数: {{ $happyExperiences }}</li>
            <li>嫌だった経験数: {{ $sadExperiences }}</li> --}}
    
        <!-- 積み木グラフ -->
        {{-- <div style="max-width: 400px; margin: 20px auto;">
            <canvas id="stackedBarChart"></canvas>
        </div> --}}
    </div>



</div>

<!-- 2段目: 左側 - アクション、右側 - 進捗状況 -->
<div class="flex flex-wrap gap-6 layout-row">
    <div class="bg-white rounded-lg shadow p-6 flex-1">
        <h3 class="text-lg font-semibold text-gray-800">アクションステップ</h3>
        <div class="flex flex-wrap gap-4 mt-4">

            <a href="{{ route('experiences.create') }}" 
                class="bg-white border border-gray-700 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm hover:bg-gray-100 hover:border-gray-800">
                経験を入力する
            </a>

            <a href="{{ route('feedback.index') }}" 
                class="bg-white border border-gray-700 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm hover:bg-gray-100 hover:border-gray-800">
                フィードバックの依頼
            </a>

            <a href="{{ route('experiences.edit', ['id' => 1]) }}" 
                class="bg-white border border-gray-700 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm hover:bg-gray-100 hover:border-gray-800">
                価値観（未設定）
            </a>

        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 flex-1">
        <h3 class="text-lg font-semibold text-gray-800">進捗状況</h3>
        <div class="progress-container mt-4">
            <div id="progress-bar" class="progress-bar" style="width: 90%;"></div>
        </div>
        <p class="text-sm mt-2" id="progress-text">90% 完了</p>
    </div>

    <div class="p-6 space-y-6">
    

        

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
                <h3 class="text-lg font-semibold text-gray-800">あなたの強み</h3>
                <a href="{{ route('feedback.summary') }}" 
                class="bg-white border border-gray-700 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm 
                        hover:bg-gray-100 hover:border-gray-800">
                    全てのフィードバックを見る
                </a>

                {{-- <a href="{{ route('feedback.summary') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow hover:bg-gray-600">
                    全てのフィードバックを見る2
                </a> --}}


                <ul class="list-disc pl-6 text-gray-800 mt-4">

                    <!-- あなたの強み（フィードバック） -->
<div class="bg-white rounded-lg shadow p-6">
    <p class="text-gray-600 mb-4">周囲から見たあなたの素晴らしい部分がここに表示されます。</p>
    <div class="space-y-4">
        <div class="flex flex-wrap gap-4">
            @foreach ($feedbacks as $feedback)
                <div class="text-gray-700">
                    <span class="font-bold">{{ $feedback->feedback_provider }}（ステータス: {{ $feedback->status }}）</span>
                    <span>『{{ $feedback->feedback_content }}』</span>
                </div>
            @endforeach
        </div>
    </div>
</div>

</div>

            

            


            


        </div>

</div>

<div class="bg-white rounded-lg shadow p-6 flex-1">
    <h3 class="text-lg font-semibold text-gray-800">ヘルプ</h3>
    <ul class="list-disc pl-6 text-gray-800 mt-4">
        <li><a href="help" class="text-blue-500 hover:text-blue-600">システムの使い方</a></li>
        <li><a href="/help.faq" class="text-blue-500 hover:text-blue-600">よくある質問</a></li>
        
    </ul>
</div>

                

            <div class="relative">
                <!-- ドロップダウンメニュー -->
                <div id="menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
                    <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                    <a href="/logout" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Log Out</a>
                </div>
            </div>
        </div>
    </x-slot>

    

    <footer class="bg-gray-800 text-white py-4 mt-12 text-center">
        &copy; {{ date('Y') }} My Application. All rights reserved.
    </footer>

   <!-- 修正後CSS -->
   <style>
    
   /* 進捗バー */
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

/* レイアウト調整 */
.layout-row {
    display: flex;
    flex-wrap: wrap;  /* 横並びのカードが折り返される */
    justify-content: space-between; /* 左から右にカードを並べる */
    gap: 30px; /* カード間の隙間 */
    align-items: flex-start;
}

/* 外側のカード */
.outer-card {
    background-color: white;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
}

/* 内側のカード（左・右に分ける） */
.inner-card {
    flex: 0 1 48%; /* 左右に分けて、それぞれカードを配置 */
    margin-right: 4%; /* 右カードの隙間 */
    margin-bottom: 20px; /* 下に余白 */
}

/* 最後の右側のカードのマージンを消す */
.inner-card:last-child {
    margin-right: 0;
}

/* 内側のカードのタイトル */
h3 {
    font-size: 1.125rem; /* 見出しのサイズ */
    color: #2d3748; /* テキストの色 */
    font-weight: 600;
}

/* アクションボタン */
.flex-wrap {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

/* グラフ部分のスタイル */
canvas {
    display: block;
    max-width: 100%;
    height: auto;
    margin: 0 auto;
}

/* スペース調整 */
.space-y-6 {
    margin-bottom: 30px;
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
