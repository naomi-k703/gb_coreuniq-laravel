<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8"> <!-- ページの文字コードをUTF-8に設定（日本語対応） -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- レスポンシブデザインのための設定 -->
    <title>経験一覧</title>

    <!-- 削除時に確認ダイアログを表示するJavaScript -->
    <script>
        // 削除ボタンが押されたときに確認ダイアログを表示する関数
        function confirmDelete() {
            return confirm('本当に削除しますか？'); // ユーザーに削除確認を促す
        }
    </script>

    <!-- テーブルのデザインを調整するCSS -->
    <style>
        /* ベーススタイル */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafb;  /* 背景色をシンプルな明るいグレーに */
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
            background-color: #f4f4f4; /* ヘッダー背景を薄いグレーに */
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;  /* 行にカーソルを合わせたときに背景色を変更 */
        }

        /* ボタンデザイン */
        .button {
            padding: 6px 12px;
            text-decoration: none;
            color: white;
            background-color: #6b7280;  /* ボタンの背景色はシンプルなグレー */
            border-radius: 8px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #4b5563;  /* ボタンのホバー時に少し濃くなる */
        }

        .button-delete {
            background-color: #dc2626;  /* 削除ボタンは赤に */
        }

        .button-delete:hover {
            background-color: #b91c1c;  /* 削除ボタンのホバー時は濃い赤 */
        }
    </style>
</head>
<body>
    <!-- ページの見出し -->
    <h1>経験の一覧</h1>

    <!-- 新規作成ボタン -->
    <div class="button-create" style="margin-bottom: 20px; text-align: center;">
        <a href="{{ route('experiences.create') }}" class="button">新しい経験を作成</a>
    </div>

    <!-- 経験データを表示するテーブル -->
    <table>
        <thead>
            <tr>
                <!-- テーブルのカラム（列）の見出し -->
                <th>ID</th> <!-- 経験の一意のID -->
                <th>ユーザーID</th> <!-- ユーザーを識別するID -->
                <th>年齢</th> <!-- 年齢を表示するカラムを追加 -->
                <th>経験タイプ</th> <!-- 例: "嬉しかった" など -->
                <th>経験の詳細</th> <!-- 経験の内容を説明する詳細 -->
                <th>感情の強さ</th> <!-- 感情の度合いを1〜5で表現 -->
                <th>作成日時</th> <!-- データが登録された日時 -->
                <th>操作</th> <!-- 編集・削除ボタンを表示 -->
            </tr>
        </thead>
        <tbody>
            <!-- LaravelのBladeで、データを繰り返し処理してテーブルの行を生成 -->
            @foreach ($experiences as $experience)
            <tr>
                <!-- データベースから取得した値を表示 -->
                <td>{{ $experience->id }}</td> <!-- 経験のID -->
                <td>{{ $experience->user_id }}</td> <!-- ユーザーID -->
                <td>{{ $experience->age }}</td> <!-- 年齢を表示 -->
                <td>{{ $experience->experience_type }}</td> <!-- 経験タイプ -->
                <td>{{ $experience->experience_detail }}</td> <!-- 経験の詳細 -->
                <td>{{ $experience->emotion_strength }}</td> <!-- 感情の強さ -->
                <td>{{ $experience->created_at }}</td> <!-- 作成日時 -->

                <!-- 操作カラム -->
                <td>
                    <!-- 編集ボタン -->
                    <a href="{{ route('experiences.edit', $experience->id) }}" class="button">編集</a>

                    <!-- 削除ボタン -->
                    <!-- フォームを使ってデータを削除 -->
                    <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                        @csrf <!-- CSRFトークンでセキュリティを強化 -->
                        @method('DELETE') <!-- HTTPメソッドをDELETEに指定 -->
                        <button type="submit" class="button button-delete">削除</button> <!-- 削除ボタン -->
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
