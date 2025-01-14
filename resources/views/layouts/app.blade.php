<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex bg-gray-100">
            <!-- サイドバーを追加 -->
            <aside class="w-64 bg-gray-50 shadow-lg border-r border-gray-200">
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

            <!-- メインコンテンツ -->
            <div class="flex-1">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
