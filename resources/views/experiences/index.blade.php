<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>経験一覧</title>
</head>
<body>
    <h1>経験の一覧</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>ユーザーID</th>
            <th>経験タイプ</th>
            <th>経験の詳細</th>
            <th>感情の強さ</th>
            <th>作成日時</th>
        </tr>
        @foreach ($experiences as $experience)
        <tr>
            <td>{{ $experience->id }}</td>
            <td>{{ $experience->user_id }}</td>
            <td>{{ $experience->experience_type }}</td>
            <td>{{ $experience->experience_detail }}</td>
            <td>{{ $experience->emotion_strength }}</td>
            <td>{{ $experience->created_at }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
