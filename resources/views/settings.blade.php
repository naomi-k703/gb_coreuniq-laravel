<x-layouts.app>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">設定 & アカウント管理</h1>

        <!-- プロフィール設定 -->
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">プロフィール設定</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">名前</label>
                    <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200" placeholder="山田 太郎">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">メールアドレス</label>
                    <input type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200" placeholder="yamada@example.com">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">部署</label>
                    <select class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-indigo-200">
                        <option>マーケティング部</option>
                        <option>営業部</option>
                        <option>開発部</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
