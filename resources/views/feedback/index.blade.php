@extends('layouts.feedback')

@section('content')
<div class="container mx-auto p-6">
    <!-- ナビゲーションボタン -->
    <div class="mb-6 flex justify-end space-x-4">
        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow hover:bg-gray-600">
            ダッシュボード
        </a>
        <a href="{{ route('feedback.create') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow hover:bg-gray-600">
            フィードバックを作成
        </a>
        <a href="{{ route('layouts.feedback') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow hover:bg-gray-600">
            フィードバックのレイアウト
        </a>
    </div>

    <!-- ページタイトル -->
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">📅 あなたのフィードバックの旅 📅</h2>
        <p class="text-gray-600 mt-2">過去のフィードバックを振り返り、自信を高めましょう！</p>
    </div>

    <!-- ランキングとアチーブメントを横並びに -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        <!-- ランキング -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">🏆 フィードバック提供者ランキング 🏆</h3>
            <ul>
                <li class="flex items-center mb-4">
                    <div class="h-10 w-10 bg-blue-100 text-blue-800 rounded-full flex items-center justify-center font-bold text-lg">1</div>
                    <div class="ml-4">
                        <p class="text-lg font-semibold text-gray-800">山田 太郎</p>
                        <p class="text-sm text-gray-500">フィードバック数: 15件</p>
                    </div>
                </li>
                <li class="flex items-center mb-4">
                    <div class="h-10 w-10 bg-blue-100 text-blue-800 rounded-full flex items-center justify-center font-bold text-lg">2</div>
                    <div class="ml-4">
                        <p class="text-lg font-semibold text-gray-800">佐藤 花子</p>
                        <p class="text-sm text-gray-500">フィードバック数: 10件</p>
                    </div>
                </li>
                <li class="flex items-center mb-4">
                    <div class="h-10 w-10 bg-blue-100 text-blue-800 rounded-full flex items-center justify-center font-bold text-lg">3</div>
                    <div class="ml-4">
                        <p class="text-lg font-semibold text-gray-800">鈴木 一郎</p>
                        <p class="text-sm text-gray-500">フィードバック数: 8件</p>
                    </div>
                </li>
            </ul>
        </div>

        <!-- アチーブメント -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">🎯 あなたのアチーブメント 🎯</h3>
            <div class="grid grid-cols-1 gap-4">
                <div class="bg-green-50 p-6 rounded-lg shadow-md text-center">
                    <h4 class="text-lg font-bold text-green-700 mb-2">ポジティブフィードバック</h4>
                    <p class="text-3xl font-bold text-green-800">12</p>
                    <p class="text-gray-600 mt-2">ポジティブなフィードバックの数です！</p>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg shadow-md text-center">
                    <h4 class="text-lg font-bold text-blue-700 mb-2">合計フィードバック</h4>
                    <p class="text-3xl font-bold text-blue-800">20</p>
                    <p class="text-gray-600 mt-2">これまでに受け取ったフィードバックの総数です。</p>
                </div>
            </div>
        </div>
    </div>

    <!-- タイムライン -->
    <div class="relative border-l border-gray-300">
        @foreach ($feedbacks as $feedback)
            <div class="mb-10 ml-6">
                <div class="absolute -left-3 w-6 h-6 bg-blue-200 rounded-full border border-blue-400"></div>
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <p class="text-sm text-gray-500">{{ $feedback->created_at->format('Y年m月d日 H:i') }}</p>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $feedback->feedback_provider }}</h3>
                    <p class="text-gray-700 mt-2">{{ $feedback->feedback_content }}</p>
                    <span class="text-sm px-3 py-1 rounded-full 
                        {{ $feedback->status == 'pending' ? 'bg-yellow-100 text-yellow-600' : 'bg-green-100 text-green-600' }}">
                        {{ ucfirst($feedback->status) }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

