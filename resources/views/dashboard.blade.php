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
    <div class="p-6 text-gray-900">
        {{ __("あなたのメールアドレス: ") . Auth::user()->email }}
    </div>

    <!-- セクション内リンク -->
    <div class="mt-6">
        <a href="{{ route('experiences.create') }}" class="text-blue-500 underline">経験を入力する</a>
        <a href="{{ route('experiences.index') }}" class="text-blue-500 underline ml-4">経験を一覧表示する</a>
        <a href="{{ route('experiences.edit', ['id' => 1]) }}" class="text-blue-500 underline ml-4">経験を更新する</a>
        <!-- ↑ 更新画面のリンクは仮でID 1にしています。動的に変更する場合は適宜修正してください。 -->
    </div>

    <!-- 外部リンク一覧 -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("ようこそ！") }}
                </div>

                <div class="mt-6">
                    <a href="/profile" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        プロフィールを編集
                    </a>
                </div>

                <!-- 外部リンク一覧 -->
                <div class="mt-6">
                    <ul class="list-disc list-inside">
                        <li><a href="{{ route('experiences.create') }}" class="text-blue-500 underline">経験を入力する</a></li>
                        <li><a href="{{ route('experiences.index') }}" class="text-blue-500 underline">経験を一覧表示する</a></li>
                        <li><a href="{{ route('experiences.edit', ['id' => 1]) }}" class="text-blue-500 underline">経験を更新する</a></li>
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


