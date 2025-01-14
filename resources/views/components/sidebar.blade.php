<aside class="w-64 bg-gray-50 shadow-lg border-r border-gray-200">
    <style>
        /* サイドバー全体 */
        aside {
            background-color: #f8fafc; /* 明るいグレー */
            border-right: 1px solid #e5e7eb; /* 薄いボーダー */
        }

        /* サイドバーのヘッダー */
        aside div {
            font-family: 'Figtree', sans-serif;
            font-size: 1.25rem; /* 20px */
            font-weight: 700;
            padding: 1rem;
            color: #1f2937; /* 濃いグレー */
            border-bottom: 1px solid #e5e7eb; /* ヘッダーのボーダー */
        }

        /* リンクのデザイン */
        aside ul li a {
            font-size: 0.875rem; /* 14px */
            padding: 0.5rem 1rem;
            display: block;
            border-radius: 0.375rem; /* 6px */
            color: #4b5563; /* テキスト色 */
            transition: all 0.2s ease-in-out;
        }

        /* ホバー状態 */
        aside ul li a:hover {
            background-color: #e0e7ff; /* Indigoの薄い色 */
            color: #4338ca; /* Indigoの濃い色 */
        }

        /* アクティブリンク（現在のページを示す場合） */
        aside ul li a.active {
            background-color: #c7d2fe; /* Indigoのもう少し濃い色 */
            color: #1e3a8a; /* Indigoのさらに濃い色 */
            font-weight: bold;
        }
    </style>
    <div class="p-4 font-bold text-xl text-gray-800 border-b border-gray-200">
        Core Uniq
    </div>
    <ul class="space-y-2 mt-4">
        <li>
            <a href="{{ route('dashboard') }}" 
               class="block px-4 py-2 text-gray-600 hover:bg-indigo-100 hover:text-indigo-700 rounded-md transition duration-200">
                ダッシュボード
            </a>
        </li>
        <li>
            <a href="{{ route('experiences.create') }}" 
               class="block px-4 py-2 text-gray-600 hover:bg-indigo-100 hover:text-indigo-700 rounded-md transition duration-200">
                自己発見
            </a>
        </li>
        <li>
            <a href="{{ route('feedback.index') }}" 
               class="block px-4 py-2 text-gray-600 hover:bg-indigo-100 hover:text-indigo-700 rounded-md transition duration-200">
                フィードバック
            </a>
        </li>
        <li>
            <a href="{{ route('settings') }}" 
               class="block px-4 py-2 text-gray-600 hover:bg-indigo-100 hover:text-indigo-700 rounded-md transition duration-200">
                設定
            </a>
        </li>
    </ul>
</aside>
