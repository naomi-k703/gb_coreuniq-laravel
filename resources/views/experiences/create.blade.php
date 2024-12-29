<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>経験の棚卸し</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* 全体のスタイル */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafb;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .user-info {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 16px;
            color: #4b5563;
        }
        .nav-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            text-decoration: none;
            color: white;
            background-color: #6b7280;
            border-radius: 8px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .nav-button:hover {
            background-color: #4b5563;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #10b981;
            outline: none;
        }
        .dynamic-form {
            margin-bottom: 15px;
            padding: 15px;
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            position: relative;
        }
        .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #1e40af;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            font-size: 16px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .remove-btn:hover {
            background: #1d4ed8;
        }
        button {
            padding: 10px 15px;
            background-color: #6b7280;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            font-weight: 500;
        }
        button:hover {
            background-color: #4b5563;
        }
        .slider-container {
            display: flex;
            align-items: center;
        }
        .slider-container input[type="range"] {
            flex-grow: 1;
            margin: 0 10px;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="user-info">
        @if (Auth::check())
            {{ Auth::user()->name }} さん
        @else
            ゲスト さん
        @endif
    </div>

    <div class="container">
        <!-- ダッシュボードに戻るボタン -->
        <h1>STEP１自己発見：経験の棚卸し</h1>

        <a href="/dashboard" class="nav-button">ダッシュボードに戻る</a>
        
        <form method="POST" action="{{ route('experiences.store') }}">
            @csrf

            <div class="dynamic-form">
                <label for="user_id">ユーザーID：</label>
                <input type="number" id="user_id" name="user_id" 
                       value="{{ Auth::check() ? Auth::user()->id : 0 }}" readonly required>
            </div>

            <div id="experience-container">
                <div class="dynamic-form">
                    <button type="button" class="remove-btn" onclick="removeExperience(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>

                    <label for="age">年齢：</label>
                    <input type="number" name="age[]" min="0" max="120" placeholder="例: 25" required>

                    <label>経験タイプ：</label>
                    <select name="experience_type[]" required>
                        <option value="嬉しかった">😊 嬉しかった</option>
                        <option value="嫌だった">😞 嫌だった</option>
                    </select>

                    <label>経験の詳細（例: 内容や背景）：</label>
                    <textarea name="experience_detail[]" placeholder="例: 学校で友達に助けられて嬉しかった経験" rows="3" required></textarea>

                    <label>感情の強さ（1-5）：</label>
                    <div class="slider-container">
                        <span>1</span>
                        <input type="range" name="emotion_strength[]" min="1" max="5" value="3" 
                               oninput="this.nextElementSibling.innerText = this.value">
                        <span>3</span>
                    </div>
                </div>
            </div>

            <div class="button-group">
                <button type="button" onclick="addExperience()">＋ フォームを追加</button>
                <button type="submit">送信</button>
            </div>
        </form>
    </div>

    <script>
        function addExperience() {
            const container = document.getElementById('experience-container');
            const form = document.createElement('div');
            form.className = 'dynamic-form';
            form.innerHTML = `
                <button type="button" class="remove-btn" onclick="removeExperience(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>

                <label for="age">年齢：</label>
                <input type="number" name="age[]" min="0" max="120" placeholder="例: 25" required>

                <label>経験タイプ：</label>
                <select name="experience_type[]" required>
                    <option value="嬉しかった">😊 嬉しかった</option>
                    <option value="嫌だった">😞 嫌だった</option>
                </select>

                <label>経験の詳細（例: 内容や背景）：</label>
                <textarea name="experience_detail[]" placeholder="例: 学校で友達に助けられて嬉しかった経験" rows="3" required></textarea>

                <label>感情の強さ（1-5）：</label>
                <div class="slider-container">
                    <span>1</span>
                    <input type="range" name="emotion_strength[]" min="1" max="5" value="3" 
                           oninput="this.nextElementSibling.innerText = this.value">
                    <span>3</span>
                </div>
            `;
            container.appendChild(form);
        }

        function removeExperience(button) {
            button.parentElement.remove();
        }
    </script>
</body>
</html>
