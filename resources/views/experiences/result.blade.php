<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>保存結果</title>
    <style>
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
            font-size: 28px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .button {
            padding: 8px 12px;
            text-decoration: none;
            color: white;
            background-color: #6b7280;
            border-radius: 8px;
            font-size: 14px;
            display: inline-block;
        }
        .button:hover {
            background-color: #4b5563;
        }
    </style>
</head>
<body>
    <h1>保存された経験</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ユーザーID</th>
                <th>年齢</th> <!-- 年齢のカラムを追加 -->
                <th>経験タイプ</th>
                <th>経験の詳細</th>
                <th>感情の強さ</th>
                <th>作成日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($createdExperiences as $experience)
            <tr>
                <td>{{ $experience->id }}</td>
                <td>{{ $experience->user_id }}</td>
                <td>{{ $experience->age }}</td> <!-- 年齢を表示 -->
                <td>{{ $experience->experience_type }}</td>
                <td>{{ $experience->experience_detail }}</td>
                <td>{{ $experience->emotion_strength }}</td>
                <td>{{ $experience->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ route('experiences.handle') }}" class="button">新しい経験を追加する</a>
        <a href="{{ route('experiences.index') }}" class="button">一覧に戻る</a>
    </div>
</body>
</html>
