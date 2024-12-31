<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>感情曲線</title>

    <!-- Chart.js のCDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- スタイル -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        p {
            text-align: center;
            font-size: 14px;
            margin-bottom: 30px;
            color: #666;
        }

        .chart-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        canvas {
            display: block;
            max-width: 100%;
            height: 400px;
        }

        /* ボタン共通スタイル */
        .nav-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .nav-button {
            display: inline-block;
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            background-color: #10b981;
            border-radius: 8px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .nav-button:hover {
            background-color: #059669;
        }
    </style>
</head>
<body>
    <!-- ボタンの配置 -->
    <div class="nav-buttons">
        <a href="{{ route('experiences.create') }}" class="nav-button">新規作成</a>
        <a href="{{ route('experiences.index') }}" class="nav-button">経験一覧</a>
        <a href="/dashboard" class="nav-button">ダッシュボード</a>
    </div>

    <!-- ページタイトルと説明 -->
    <h1>感情曲線</h1>
    <p>
        以下のグラフは、各経験の感情の強さを視覚化したものです。<br>
        データポイントにカーソルを合わせると、経験の詳細（コメント）が表示されます。
    </p>

    <!-- グラフのコンテナ -->
    <div class="chart-container">
        <canvas id="emotionChart"></canvas>
    </div>

    <!-- Chart.js のスクリプト -->
    <script>
        // サーバーサイドから渡されたデータ
        const experiences = @json($experiences);

        // データを整理
        const labels = experiences.map(e => `ID: ${e.id}`);
        const emotionStrengths = experiences.map(e => e.emotion_strength);
        const comments = experiences.map(e => e.experience_detail);

        // Chart.js 設定
        const ctx = document.getElementById('emotionChart').getContext('2d');
        const emotionChart = new Chart(ctx, {
            type: 'line', // ラインチャート
            data: {
                labels: labels,
                datasets: [{
                    label: '感情の強さ',
                    data: emotionStrengths,
                    borderColor: 'rgba(75, 192, 192, 1)', // 線の色
                    backgroundColor: 'rgba(75, 192, 192, 0.2)', // 背景色
                    borderWidth: 2 // 線の太さ
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // アスペクト比を無効化
                plugins: {
                    tooltip: {
                        callbacks: {
                            // ツールチップにコメントを表示
                            label: function(tooltipItem) {
                                const index = tooltipItem.dataIndex; // データのインデックス
                                const comment = comments[index]; // コメント
                                const emotionStrength = tooltipItem.raw; // 感情の強さ
                                return `感情の強さ: ${emotionStrength}, コメント: ${comment}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true, // Y軸をゼロから開始
                        max: 5 // Y軸の最大値を設定
                    }
                }
            }
        });
    </script>
</body>
</html>
