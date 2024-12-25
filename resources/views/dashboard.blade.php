<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }} //Dashboardから変更
        </h2>
    </x-slot>

    <!-- 挨拶 -->
    <div class="p-6 text-gray-900">
        {{ __("こんにちは、") . Auth::user()->name . __(" さん！") }}
    </div>
    <div class="p-6 text-gray-900">
        {{ __("あなたのメールアドレス: ") . Auth::user()->email }}
    </div>

    <!-- セクション内リンク -->
    <div class="mt-6">
        <a href="#section1" class="text-blue-500 underline">セクション1に移動</a>
        <a href="#section2" class="text-blue-500 underline ml-4">セクション2に移動</a>
    </div>

    <!-- セクション1 -->
    <div id="section1" class="mt-12 bg-gray-100 p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold">セクション1</h3>
        <p>これはセクション1の内容です。</p>
    </div>

    <!-- セクション2 -->
    <div id="section2" class="mt-12 bg-gray-100 p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold">セクション2</h3>
        <p>これはセクション2の内容です。</p>
    </div>

    <!-- プロフィール編集と外部リンク -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ようこそ！") }} //You're logged in!から変更
                </div>

                <div class="mt-6">
                    <a href="/profile" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        プロフィールを編集
                    </a>
                </div>

                <!-- 外部リンク一覧 -->
                <div class="mt-6">
                    <ul class="list-disc list-inside">
                        <li><a href="/profile" class="text-blue-500 underline">プロフィール</a></li>
                        <li><a href="/tasks" class="text-blue-500 underline">タスク管理</a></li>
                        <li><a href="/settings" class="text-blue-500 underline">設定</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- フッター -->
    <footer class="bg-gray-800 text-white py-4 mt-12 text-center">
        &copy; {{ date('Y') }} My Application. All rights reserved.
    </footer>
</x-app-layout>


