<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>経験編集</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            color: #495057;
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #495057;
        }

        input[type="number"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="range"] {
            width: 100%;
            margin-bottom: 15px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background: linear-gradient(90deg, #4caf50, #81c784); /* プログレスバーと同じ緑 */
            color: #fff;
            transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        button[type="submit"]:hover {
            background: linear-gradient(90deg, #43a047, #66bb6a); /* ホバー時に少し濃く */
            transform: scale(1.02); /* 少し拡大してアニメーションを追加 */
        }

        /* レスポンシブ対応 */
        @media (max-width: 768px) {
            form {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <h1>経験を編集</h1>
    <form method="POST" action="{{ route('experiences.update', $experience->id) }}">
        @csrf
        @method('PUT')

        <label for="user_id">ユーザーID:</label>
        <input type="number" name="user_id" value="{{ $experience->user_id }}" readonly required>

        <label for="age">年齢:</label>
        <input type="number" name="age" value="{{ $experience->age }}" min="0" max="120" required>

        <label for="experience_type">経験タイプ:</label>
        <select name="experience_type" required>
            <option value="嬉しかった" {{ $experience->experience_type == '嬉しかった' ? 'selected' : '' }}>嬉しかった</option>
            <option value="嫌だった" {{ $experience->experience_type == '嫌だった' ? 'selected' : '' }}>嫌だった</option>
        </select>

        <label for="experience_detail">経験の詳細:</label>
        <textarea name="experience_detail" required>{{ $experience->experience_detail }}</textarea>

        <label for="emotion_strength">感情の強さ:</label>
        <input type="range" name="emotion_strength" min="1" max="5" value="{{ $experience->emotion_strength }}" required>

        <button type="submit">更新</button>
    </form>
</body>
</html>
