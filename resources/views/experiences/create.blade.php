<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('（Step1）経験の棚卸しと自己発見') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="bg-gray-50 p-4 rounded shadow-md flex items-center space-x-4">
                        <!-- ユーザーID -->
                        <div class="flex items-center space-x-2">
                            <label for="user_id" class="font-semibold text-gray-600">ユーザーID：</label>
                            <input type="number" id="user_id" name="user_id" 
                                   value="{{ Auth::check() ? Auth::user()->id : 0 }}" readonly required 
                                   class="w-16 border border-gray-300 rounded px-2 py-1 text-center">
                        </div>
                    
                        <!-- ユーザー名 -->
                        <div class="text-gray-700 font-semibold">
                            @if (Auth::check())
                                {{ Auth::user()->name }} さん
                            @else
                                ゲスト さん
                            @endif
                        </div>
                    </div>
                    
                        <!-- ナビゲーションボタン -->
                    <div class="nav-buttons flex gap-2 justify-end">
                        <a href="{{ route('dashboard') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200">ダッシュボードに戻る</a>
                        <a href="{{ route('experiences.chart') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200">感情曲線を見る</a>
                        <a href="{{ route('experiences.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200">経験一覧を見る</a>
                    </div>

                    <!-- フォーム -->
                    <form method="POST" action="{{ route('experiences.store') }}" class="space-y-6" enctype="multipart/form-data">

                        @csrf

                        <div id="experience-container" class="space-y-6">
                            <div class="bg-gray-50 p-4 rounded shadow-md relative">
                                <button type="button" class="remove-btn absolute top-2 right-2 text-sm">削除</button>

                                <!-- 修正: 各フォームフィールドに一意のidを付与 -->
                                <label for="age_1" class="block font-semibold text-gray-600">年齢：</label>
                                <input type="number" id="age_1" name="age[]" min="0" max="120" placeholder="例: 25" required 
                                       class="w-full border border-gray-300 rounded px-4 py-2">

                                <label for="experience_type_1" class="block font-semibold text-gray-600">経験タイプ：</label>
                                <select id="experience_type_1" name="experience_type[]" required 
                                        class="w-full border border-gray-300 rounded px-4 py-2">
                                    <option value="嬉しかった">😊 嬉しかった</option>
                                    <option value="嫌だった">😞 嫌だった</option>
                                </select>

                                <label for="experience_detail_1" class="block font-semibold text-gray-600">経験の詳細（例: 内容や背景）：</label>
                                <textarea id="experience_detail_1" name="experience_detail[]" placeholder="例: 学校で友達に助けられて嬉しかった経験" rows="3" required 
                                          class="w-full border border-gray-300 rounded px-4 py-2"></textarea>

                                <label for="emotion_strength_1" class="block font-semibold text-gray-600">感情の強さ（1-5）：</label>
                                <div class="slider-container flex items-center gap-2">
                                    <span>1</span>
                                    <input type="range" id="emotion_strength_1" name="emotion_strength[]" min="1" max="5" value="3" 
                                           oninput="this.nextElementSibling.innerText = this.value" 
                                           class="flex-grow">
                                    <span>3</span>
                                </div>
                            </div>
                        </div>

                        <div class="button-group flex justify-between items-center">
                            <button type="button" onclick="addExperience()" 
                                    class="bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200">＋ フォームを追加</button>
                            <button type="submit" 
                                    class="bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200">送信</button>
                        </div>
                    </form>

                    <div class="next-button-group text-center mt-6">
                        <a href="{{ route('feedback.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200">次へ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .remove-btn {
            background: #fde2e1;
            color: #e63946;
            border: none;
            border-radius: 8px;
            padding: 5px 10px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .remove-btn:hover {
            background: #e63946;
            color: #fff;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }
    </style>

    @push('scripts')
    <script>

let counter = 1; // カウンターを初期化

function addExperience() {
    counter++; // カウンターをインクリメント
    const container = document.getElementById('experience-container');
    const form = document.createElement('div');

    // 新しいフォーム構造
    form.className = 'bg-gray-50 p-4 rounded shadow-md relative';
    form.innerHTML = `
        <button type="button" class="remove-btn absolute top-2 right-2 text-sm" onclick="removeExperience(this)">削除</button>
        <label for="age_${counter}" class="block font-semibold text-gray-600">年齢：</label>
        <input type="number" id="age_${counter}" name="age[]" min="0" max="120" placeholder="例: 25" required 
               class="w-full border border-gray-300 rounded px-4 py-2">

        <label for="experience_type_${counter}" class="block font-semibold text-gray-600">経験タイプ：</label>
        <select id="experience_type_${counter}" name="experience_type[]" required 
                class="w-full border border-gray-300 rounded px-4 py-2">
            <option value="嬉しかった">😊 嬉しかった</option>
            <option value="嫌だった">😞 嫌だった</option>
        </select>

        <label for="experience_detail_${counter}" class="block font-semibold text-gray-600">経験の詳細（例: 内容や背景）：</label>
        <textarea id="experience_detail_${counter}" name="experience_detail[]" rows="3" required 
                  class="w-full border border-gray-300 rounded px-4 py-2"
                  placeholder="例: 学校で友達に助けられて嬉しかった経験"></textarea>

        <label for="emotion_strength_${counter}" class="block font-semibold text-gray-600">感情の強さ（1-5）：</label>
        <div class="slider-container flex items-center gap-2">
            <span>1</span>
            <input type="range" id="emotion_strength_${counter}" name="emotion_strength[]" min="1" max="5" value="3" 
                   oninput="this.nextElementSibling.innerText = this.value" class="flex-grow">
            <span>3</span>
        </div>
    `;

    console.log(`フォームが追加されました:`, form); // デバッグ用ログ
    container.appendChild(form); // 新しいフォームをコンテナに追加
}

function removeExperience(button) {
    button.parentElement.remove(); // 削除ボタンが押されたときに親要素を削除
    console.log("フォームが削除されました"); // デバッグ用ログ
}

// フォーム送信時にデータ確認
document.querySelector("form").addEventListener("submit", (event) => {
    console.log("送信開始"); // デバッグ用ログ
    const formData = new FormData(event.target);
    console.log("送信データ:", Object.fromEntries(formData.entries())); // デバッグ用
    // フォーム送信をそのまま許可します
});


    </script>
    @endpush
</x-app-layout>
