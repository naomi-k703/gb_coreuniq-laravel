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
    max-width: 1400px; /* 横幅を適切に設定 */
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

/* 説明文 */
p {
    font-size: 1rem;
    color: #555555;
    margin-bottom: 30px;
    line-height: 1.6;
}

/* ステップエリア */
.steps {
    display: flex; /* 横並び */
    justify-content: space-between; /* 均等配置 */
    align-items: flex-start; /* 上揃え */
    gap: 20px; /* スペース調整 */
    margin-bottom: 20px;
    flex-wrap: wrap; /* 必要に応じて折り返し */
}

/* 各ステップ */
.step {
    flex: 1; /* 子要素の幅を均等に */
    min-width: 300px; /* 子要素の最小幅を設定 */
    background: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    text-align: center;
}

.step-icon {
    font-size: 2rem;
    margin-bottom: 10px;
}

.step-title {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.step-description {
    font-size: 1rem;
    line-height: 1.5;
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
    .steps {
        flex-direction: column; /* モバイルでは縦並び */
    }
}


    </style>

    <div class="container">
        <!-- タイトル -->
        <h1>Core Uniqの使い方</h1>
        
        <!-- 説明文 -->
        
        <!-- ステップエリア -->
        <div class="steps">
            <!-- ステップ1 -->
            <div class="step">
                <div class="step-icon">💡</div>
                <div class="step-title">ステップ1: 自分を発見する</div>
                <div class="step-description">過去の経験から価値観や強みを発掘！</div>
                <div class="step-description">💡「意外な自分に気づくはず！」</div>
            </div>

            <!-- ステップ2 -->
            <div class="step">
                <div class="step-icon">🎯</div>
                <div class="step-title">ステップ2: 未来をデザインする</div>
                <div class="step-description">明確な目標と具体的な行動を設計！</div>
                <div class="step-description">🎯「目標への道が見えてきます！」</div>
            </div>

            <!-- ステップ3 -->
            <div class="step">
                <div class="step-icon">🚀</div>
                <div class="step-title">ステップ3: 進む力をつける</div>
                <div class="step-description">小さな成功を積み重ね、成長を実感！</div>
                <div class="step-description">🚀 「一歩ずつ進んでいきましょう！」</div>
            </div>
        </div>
        
        <!-- ボタンエリア -->
        <div class="buttons">
            <a href="{{ route('experienceIntro') }}" class="btn">次に進む</a>
        </div>
    </div>
</x-guest-layout>
