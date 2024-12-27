<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>

    <!-- 挨拶 -->
    <div class="p-6 text-gray-900">
        {{ __("こんにちは、") . Auth::user()->name . __(" さん！") }}
    </div>

    <div class="p-6 text-gray-900 mb-6">
        {{ __("あなたのメールアドレス: ") . Auth::user()->email }}
    </div>

    <!-- セクション内リンク -->
    <div class="mt-6 space-y-4">
        <a href="{{ route('experiences.create') }}" class="bg-blue-500 hover:bg-blue-600 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition duration-200">
            経験を入力する
        </a>
        <a href="{{ route('experiences.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition duration-200">
            経験を一覧表示する
        </a>
        <a href="{{ route('experiences.edit', ['id' => 1]) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-sm transition duration-200">
            経験を更新する
        </a>
    </div>

    <!-- 外部リンク一覧 -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ようこそ！") }}
                </div>

                <div class="mt-6">
                    <a href="/profile" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-sm transition duration-200">
                        プロフィールを編集
                    </a>
                </div>

                <!-- 外部リンク一覧 -->
                <div class="mt-6 space-y-2">
                    <ul class="list-none">
                        <li><a href="{{ route('experiences.create') }}" class="text-blue-500 hover:text-blue-600">経験を入力する</a></li>
                        <li><a href="{{ route('experiences.index') }}" class="text-blue-500 hover:text-blue-600">経験を一覧表示する</a></li>
                        <li><a href="{{ route('experiences.edit', ['id' => 1]) }}" class="text-blue-500 hover:text-blue-600">経験を更新する</a></li>
                        <li><a href="/tasks" class="text-blue-500 hover:text-blue-600">タスク管理</a></li>
                        <li><a href="/settings" class="text-blue-500 hover:text-blue-600">設定</a></li>
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

