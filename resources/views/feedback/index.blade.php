@extends('layouts.feedback') <!-- 新しいレイアウトを使用 -->

@section('content')
<div class="container mx-auto p-6">
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-bold mb-4">送信されたフィードバック</h2>
        <ul class="space-y-4">
            @foreach ($feedbacks as $feedback)
                <li class="border border-gray-300 rounded-md p-4">
                    <p><strong>提供者:</strong> {{ $feedback->feedback_provider }}</p>
                    <p><strong>内容:</strong> {{ $feedback->feedback_content }}</p>
                    <p><small>ステータス: {{ $feedback->status }}</small></p>
                    <p><small>送信日時: {{ $feedback->created_at->format('Y-m-d H:i') }}</small></p>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

