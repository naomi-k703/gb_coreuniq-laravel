<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>経験編集</title>
</head>
<body>
    <h1>経験を編集</h1>
    <form method="POST" action="{{ route('experiences.update', $experience->id) }}">
        @csrf
        @method('PUT')

        <label for="user_id">ユーザーID:</label>
        <input type="number" name="user_id" value="{{ $experience->user_id }}" required>

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
