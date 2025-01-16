<x-guest-layout>
    <style>
        /* 全体スタイル */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #f7faff, #ffffff);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* コンテナ */
        .container {
            text-align: center;
            margin: 20px auto;
            max-width: 1000px; /* 横幅を調整 */
            padding: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* タイトル */
        h1 {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #2b2b2b;
        }

        /* 説明文とリスト */
        p {
            font-size: 1.2rem;
            color: #555555;
            margin-bottom: 30px;
            line-height: 1.8;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 20px auto;
            max-width: 600px;
        }

        ul li {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        ul li::before {
            content: "✨";
            font-size: 1.5rem;
        }

        /* ボタンエリア */
        .buttons {
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 1.1rem;
            font-weight: bold;
            text-decoration: none;
            border-radius: 8px;
            background-color: #000000; /* 黒いボタン */
            color: #ffffff;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            background-color: #333333;
            transform: scale(1.05);
        }

        /* レスポンシブ対応 */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }

            p, ul li {
                font-size: 1rem;
            }

            .btn {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }
    </style>

    <!-- コンテンツ -->
    <div class="container">
        <!-- タイトル -->
        <h1>Core Uniqで得られること</h1>
        
        <!-- リスト -->
        <ul>
            <li>✨ 自分らしさを発見</li>
            <li>🌈 未来の目標が実現</li>
            <li>💪 成長の喜びを実感</li>
        </ul>
        
        <!-- 説明文 -->
        <p>Core Uniqと一緒に、</p>
        <p>新しい自分を見つけませんか？</p>
        
        <!-- ボタンエリア -->
        <div class="buttons">
            <a href="{{ route('dashboard') }}" class="btn">スタートする</a>
        </div>
    </div>
</x-guest-layout>



