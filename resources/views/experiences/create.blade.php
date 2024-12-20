<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>経験追加</title>
</head>
<body>
    <h1>経験を追加</h1>

    <form method="POST" action="{{ route('experiences.store') }}">
        @csrf
        <label>ユーザーID：</label>
        <input type="number" name="user_id" required><br>

        <label>経験タイプ：</label>
        <select name="experience_type" required>
            <option value="嬉しかった">嬉しかった</option>
            <option value="嫌だった">嫌だった</option>
        </select><br>

        <label>経験の詳細：</label>
        <textarea name="experience_detail" required></textarea><br>

        <label>感情の強さ (1-5)：</label>
        <input type="number" name="emotion_strength" min="1" max="5" required><br>

        <button type="submit">追加</button>
    </form>
</body>
</html>
