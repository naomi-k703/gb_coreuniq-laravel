<x-app-layout>
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">システムの使い方</h1>

        <p class="text-gray-700 mb-4">以下にシステムの使い方を説明します。</p>
        <ol class="list-decimal pl-6 text-gray-700 mb-6">
            <li>ログイン画面でメールアドレスとパスワードを入力してログインします。</li>
            <li>ダッシュボードで「新しいエントリを作成」をクリックします。</li>
            <li>必要なデータを入力して「保存」をクリックしてください。</li>
        </ol>

        <a href="{{ route('help.faq') }}" 
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            よくある質問はこちら
        </a>
    </div>
</x-app-layout>
