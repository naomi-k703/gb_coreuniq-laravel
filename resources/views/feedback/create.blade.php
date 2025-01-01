@extends('layouts.feedback') <!-- 新しいレイアウトを使用 -->

@section('content') <!-- content セクションを定義 -->
<div class="container mx-auto p-6">
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">フィードバックを入力</h2>
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="feedback_provider" class="block text-sm font-medium text-gray-700">フィードバック提供者</label>
                <input type="text" id="feedback_provider" name="feedback_provider" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" placeholder="例: 佐藤花子" required>
            </div>
            <div class="mb-4">
                <label for="feedback_content" class="block text-sm font-medium text-gray-700">フィードバック内容</label>
                <textarea id="feedback_content" name="feedback_content" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" placeholder="フィードバック内容を入力してください" required></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                    送信
                </button>
            </div>
        </form>
    </div>
</div>
@endsection <!-- content セクションの終わり -->
