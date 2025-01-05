<x-app-layout>
    <div class="bg-gradient-to-b from-[#eef6fc] to-[#ffffff] min-h-screen py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-md">
            <h1 class="text-3xl font-bold text-center /help/faq/help/faq/help/faq/help/faq/help/faq/help/faq py-6">システムの使い方</h1>
            <div class="p-6 text-gray-700">
                <p class="mb-4">以下にシステムの使い方を説明します。</p>
                <ol class="list-decimal pl-6 space-y-2">
                    <li>ログイン画面でメールアドレスとパスワードを入力してログインします。</li>
                    <li>ダッシュボードで「新しいエントリを作成」をクリックします。</li>
                    <li>必要なデータを入力して「保存」をクリックしてください。</li>
                </ol>
                <div class="text-center mt-8">
                    <a href="{{ route('help.faq') }}" 
                       class="bg-[#4A90E2] hover:text-blue-700 text-gray font-bold py-2 px-6 rounded-md shadow-md">
                        よくある質問はこちら
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tailwind CSSのインポート -->
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</x-app-layout>
