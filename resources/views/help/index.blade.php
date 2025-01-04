<x-app-layout>
    <div class="container mx-auto py-6">
        <h1 class="text-2xl font-semibold text-gray-800">システムの使い方</h1>

        {{-- ログイン状態を表示する（オプション） --}}
        @auth
            <p class="text-green-600">ログイン中：{{ Auth::user()->name }}</p>
        @else
            <p class="text-red-600">ログインしていません</p>
        @endauth

        <p>ここではシステムの使い方について説明します。</p>
        <ul class="list-disc pl-6">
            <li>1. ログインします。</li>
            <li>2. ダッシュボードで必要な操作を行います。</li>
        </ul>
        <a href="{{ route('help.faq') }}" class="text-blue-500 hover:underline">よくある質問はこちら</a>
    </div>
</x-app-layout>
