<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>経験追加</title>
    <style>
        /* 全体のスタイル */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #444;
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
            border-color: #28a745;
            outline: none;
        }

        .dynamic-form {
            margin-bottom: 15px;
            padding: 15px;
            background: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            position: relative;
        }

        .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #dc3545;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            font-size: 12px;
            cursor: pointer;
        }

        .remove-btn:hover {
            background: #c82333;
        }

        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        button:hover {
            background-color: #218838;
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
    <div class="container">
        <h1>経験を追加</h1>
        <form method="POST" action="{{ route('experiences.store') }}">
            @csrf

            <!-- 動的に追加されるフォーム -->
            <div id="experience-container">
                <div class="dynamic-form">
                    <button type="button" class="remove-btn" onclick="removeExperience(this)">×</button>
                    <label>ユーザーID：</label>
                    <input type="number" name="user_id[]" placeholder="ユーザーID" required>

                    <label>経験タイプ：</label>
                    <select name="experience_type[]" required>
                        <option value="嬉しかった">😊 嬉しかった</option>
                        <option value="嫌だった">😞 嫌だった</option>
                    </select>

                    <label>経験の詳細：</label>
                    <textarea name="experience_detail[]" placeholder="経験の詳細" rows="3" required></textarea>

                    <label>感情の強さ（1-5）：</label>
                    <div class="slider-container">
                        <span>1</span>
                        <input type="range" name="emotion_strength[]" min="1" max="5" value="3" 
                               oninput="this.nextElementSibling.innerText = this.value">
                        <span>3</span>
                    </div>
                </div>
            </div>

            <!-- 動的フォーム追加ボタン -->
            <div class="button-group">
                <button type="button" onclick="addExperience()">＋ フォームを追加</button>
                <button type="submit">送信</button>
            </div>
        </form>
    </div>

    <script>
        // フォームを追加する関数
        function addExperience() {
            const container = document.getElementById('experience-container');
            const form = document.createElement('div');
            form.className = 'dynamic-form';
            form.innerHTML = `
                <button type="button" class="remove-btn" onclick="removeExperience(this)">×</button>
                <label>ユーザーID：</label>
                <input type="number" name="user_id[]" placeholder="ユーザーID" required>

                <label>経験タイプ：</label>
                <select name="experience_type[]" required>
                    <option value="嬉しかった">😊 嬉しかった</option>
                    <option value="嫌だった">😞 嫌だった</option>
                </select>

                <label>経験の詳細：</label>
                <textarea name="experience_detail[]" placeholder="経験の詳細" rows="3" required></textarea>

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

        // フォームを削除する関数
        function removeExperience(button) {
            button.parentElement.remove();
        }
    </script>
</body>
</html>
