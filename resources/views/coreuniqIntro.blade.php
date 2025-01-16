<x-guest-layout>
    <style>
        /* 背景グラデーション */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #eaf4ff, #ffffff);
            color: #333;
        }

        /* コンテナ */
        .container {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
        }

        /* タイトル */
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333333;
        }

        /* 説明文 */
        p {
            font-size: 1.2rem;
            color: #555555;
            margin: 20px auto;
            max-width: 600px;
            line-height: 1.8;
        }

        /* ボタンエリア */
        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        /* ボタン共通スタイル */
        .btn {
            padding: 12px 24px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        /* 使い方ボタン */
        .btn-how-to-use {
            background-color: #666666;
            color: #ffffff;
        }

        .btn-how-to-use:hover {
            background-color: #444444;
        }

        /* すぐに始めるボタン */
        .btn-get-started {
            background-color: #cccccc;
            color: #333333;
            border: 2px solid transparent;
        }

        .btn-get-started:hover {
            background-color: #bbbbbb;
        }

        /* ロゴ */
        .logo {
            margin: 0 auto 30px;
            display: flex;
            justify-content: center;
        }

        /* レスポンシブ対応 */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            p {
                font-size: 1rem;
            }

            .btn {
                font-size: 14px;
                padding: 10px 16px;
            }
        }
    </style>

    <!-- コンテンツ -->
    <div class="container">
        <h1>Core Uniqへ</h1>
        <h1>ようこそ！</h1>


        <p>
            こんにちは！私は、<strong>Core Uniq。</strong>
        </p>
        <p>
            あなたの自己実現を
        </p>
        <p>
            加速させるための成長バディです！
        </p>
        <p>
        <strong>唯一無二の</strong>
        </p>
        <p>
        
        </p>
        <p>
            新しい自分を発掘し、 
        </p>
        <p>
            未来への一歩を踏み出しましょう。
        </p>

        <div class="buttons">
            <!-- 使い方を見るボタン -->
            <a href="{{ route('howToUse') }}" class="btn btn-how-to-use">使い方を見る</a>

            <!-- すぐに始めるボタン -->
            <a href="{{ route('dashboard') }}" class="btn btn-get-started">すぐに始める</a>
        </div>
    </div>
</x-guest-layout>
