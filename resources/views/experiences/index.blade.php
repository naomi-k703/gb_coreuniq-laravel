<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8"> <!-- ページの文字コードをUTF-8に設定（日本語対応） -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- レスポンシブデザインのための設定 -->
    <title>経験一覧</title>

    <!-- 削除時に確認ダイアログを表示するJavaScript -->
    <script>
        function confirmDelete() {
            return confirm('本当に削除しますか？'); // ユーザーに削除確認を促す
        }
    </script>

    <!-- デザインの調整用CSS -->
    <style>
        /* ベーススタイル */
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

        /* テーブルのスタイル */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* ボタン共通スタイル */
        .button, .btn-primary, .button-edit, .button-delete {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        /* 新規作成ボタン */
        .button {
            background-color: #10b981; /* 緑 */
            color: white;
        }

        .button:hover {
            background-color: #059669;
            transform: scale(1.05); /* ホバー時に拡大 */
        }

        /* 感情曲線ボタン */
        .btn-primary {
            background-color: #10b981; /* 緑 */
            color: white;
        }

        .btn-primary:hover {
            background-color: #059669;
            transform: scale(1.05); /* ホバー時に拡大 */
        }

        /* 編集ボタン */
        .button-edit {
            background-color: #6b7280; /* グレー */
            color: white;
        }

        .button-edit:hover {
            background-color: #4b5563; /* ホバー時の濃いグレー */
            transform: scale(1.05); /* ホバー時に拡大 */
        }

        /* 削除ボタン */
        .button-delete {
            background-color: #6b7280; /* グレー（編集ボタンと統一） */
            color: white;
        }

        .button-delete:hover {
            background-color: #4b5563; /* ホバー時の濃いグレー（編集ボタンと統一） */
            transform: scale(1.05); /* ホバー時に拡大 */
        }

        /* ボタン配置 */
        .button-group {
            display: flex;
            flex-wrap: wrap; /* レスポンシブ対応で折り返し */
            justify-content: flex-end; /* 右揃え */
            gap: 10px; /* ボタン間のスペース */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- ページの見出し -->
    <h1>経験の一覧</h1>

    <!-- ボタンを右上に配置 -->
    <div class="button-group">
        <a href="{{ route('experiences.create') }}" class="button">新しい経験を作成</a>
        <a href="/experiences/chart" class="btn-primary">感情曲線を見る</a>
        <a href="{{ route('dashboard') }}" class="btn-primary">マイページ</a>
    </div>

    <!-- テーブル -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ユーザーID</th>
                <th>年齢</th>
                <th>経験タイプ</th>
                <th>経験の詳細</th>
                <th>感情の強さ</th>
                <th>作成日時</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experiences as $experience)
            <tr>
                <td>{{ $experience->id }}</td>
                <td>{{ $experience->user_id }}</td>
                <td>{{ $experience->age }}</td>
                <td>{{ $experience->experience_type }}</td>
                <td>{{ $experience->experience_detail }}</td>
                <td>{{ $experience->emotion_strength }}</td>
                <td>{{ $experience->created_at }}</td>
                <td>
                    <!-- 編集ボタン -->
                    <a href="{{ route('experiences.edit', $experience->id) }}" class="button-edit">編集</a>

                    <!-- 削除ボタン -->
                    <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-delete">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
