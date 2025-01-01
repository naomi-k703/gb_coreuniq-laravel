<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- ページの文字コードを設定 -->
    <meta charset="UTF-8">
    <!-- ページをスマートフォンなどの小さなデバイスで正しく表示するための設定 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ページのタイトルを動的に設定 -->
    <title>{{ config('app.name', 'Laravel') }} - フィードバック</title>
    
    <!-- Google Fontsを使うためのスタイルシート -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap">
    <!-- Laravel BreezeのCSSとJavaScriptを読み込む -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <!-- Breezeで用意されているナビゲーションバーを含む全体のラッパー -->
    <div class="min-h-screen bg-gray-100">
        <!-- ナビゲーションバー（上部のメニュー部分） -->
        @include('layouts.navigation') <!-- Breezeのナビゲーションバーを表示 -->

        <!-- ページごとのヘッダー -->
        <header class="bg-white shadow">
            <div class="container mx-auto p-4">
                <h1 class="text-2xl font-bold text-gray-800">
                    <!-- ページタイトルを動的に表示 -->
                    {{ config('app.name', 'Laravel') }} - フィードバック
                </h1>
            </div>
        </header>

        <!-- メインコンテンツの部分 -->
        <main class="container mx-auto p-6">
            <!-- 子テンプレート（ページ固有の内容）が挿入される場所 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                @yield('content') <!-- 子テンプレートの content セクションを挿入 -->
            </div>
        </main>

        <!-- ページのフッター -->
        <footer class="bg-gray-800 text-white py-4">
            <div class="container mx-auto text-center">
                <!-- 著作権表示を動的に設定 -->
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
            </div>
        </footer>
    </div>
</body>
</html>
