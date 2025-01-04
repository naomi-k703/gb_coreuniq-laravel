<x-app-layout>
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold text-gray-800">よくある質問</h1>

        {{-- ログイン状態を表示する（オプション） --}}
        @auth
            <p class="text-green-600">ログイン中：{{ Auth::user()->name }}</p>
        @else
            <p class="text-red-600">ログインしていません</p>
        @endauth

        <p>ここに「よくある質問」を記述します。</p>
        <ul class="list-disc pl-6">
            <li>Q: パスワードを忘れた場合はどうすればいいですか？</li>
            <li>A: ログイン画面の「パスワードをリセット」をクリックしてください。</li>
        </ul>
        <a href="{{ route('help.index') }}" class="text-blue-500 hover:underline">システムの使い方はこちら</a>
    </div>
</x-app-layout>
