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
        /* テーブル全体の設定 */
        table {
            border-collapse: collapse; /* テーブルの境界線を統一 */
            width: 100%; /* テーブルを画面いっぱいに表示 */
        }
        /* ヘッダーとデータのセルに共通のデザインを適用 */
        th, td {
            border: 1px solid #ddd; /* セルの境界線 */
            padding: 8px; /* セル内の余白 */
        }
        /* ヘッダー行の背景色を設定 */
        th {
            background-color: #f4f4f4; /* 薄いグレー */
        }
        /* 行にカーソルを合わせたときの背景色を変更 */
        tr:hover {
            background-color: #f1f1f1; /* ハイライトの薄い色 */
        }
    </style>
</head>
<body>
    <!-- ページの見出し -->
    <h1>経験の一覧</h1>

    <!-- 経験データを表示するテーブル -->
    <table>
        <thead>
            <tr>
                <!-- テーブルのカラム（列）の見出し -->
                <th>ID</th> <!-- 経験の一意のID -->
                <th>ユーザーID</th> <!-- ユーザーを識別するID -->
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
                <td>{{ $experience->experience_type }}</td> <!-- 経験タイプ -->
                <td>{{ $experience->experience_detail }}</td> <!-- 経験の詳細 -->
                <td>{{ $experience->emotion_strength }}</td> <!-- 感情の強さ -->
                <td>{{ $experience->created_at }}</td> <!-- 作成日時 -->

                <!-- 操作カラム -->
                <td>
                    <!-- 編集ボタン -->
                    <!-- クリックすると編集ページに遷移 -->
                    <a href="{{ route('experiences.edit', $experience->id) }}" class="text-blue-500 underline">編集</a>

                    <!-- 削除ボタン -->
                    <!-- フォームを使ってデータを削除 -->
                    <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete();">
                        @csrf <!-- CSRFトークンでセキュリティを強化 -->
                        @method('DELETE') <!-- HTTPメソッドをDELETEに指定 -->
                        <button type="submit" class="text-red-500 underline">削除</button> <!-- 削除ボタン -->
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
