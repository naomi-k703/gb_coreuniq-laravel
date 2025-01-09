<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('自己選択とフィードバック (Step 2)') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-center mb-8">周囲からの強みを聞いてみましょう</h1>

        <!-- フィードバック依頼 -->
        <div class="bg-white shadow rounded-lg p-6 max-w-xl mx-auto">
            <h2 class="text-xl font-semibold mb-6 text-center">フィードバック依頼</h2>
            <form id="feedbackForm" class="flex gap-2 mb-6">
                @csrf
                <input 
                    type="email" 
                    name="email" 
                    id="emailInput"
                    placeholder="メールアドレスを入力" 
                    class="border rounded-lg w-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    required>
                <button type="button" id="requestButton" 
                    class="bg-blue-500 text-gray px-4 py-2 rounded-lg shadow hover:bg-blue-600 focus:bg-blue-700 transition flex items-center">
                    <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h14M17 10l4-4m-4 4l4 4" />
                    </svg>
                    依頼する
                </button>
            </form>
            <div id="pendingRequests" class="space-y-2">
                <!-- 依頼リストがここに反映される -->
            </div>
        </div>

        <!-- フィードバック一覧 -->
        <div class="bg-white shadow rounded-lg p-6 max-w-xl mx-auto mt-8">
            <h2 class="text-xl font-semibold mb-6 text-center">フィードバック一覧</h2>
            <div class="space-y-4">
                <div class="border rounded-lg p-4 bg-gray-50 shadow">
                    <p class="mb-2 font-semibold text-gray-800">「常に新しいアイデアを提案し、チームの創造性を高めている」</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="mr-1 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        <span>創造性</span>
                    </div>
                </div>
            </div>
        </div>




    <div class="flex justify-between mt-6 max-w-xl mx-auto">
        <!-- 戻るボタン -->
        <a href="/experiences/create" 
        class="bg-gray-100 text-gray-700 px-4 py-2 rounded shadow hover:bg-gray-200 focus:bg-gray-300 transition transform hover:scale-105">
        戻る
    </a>
    
    
        <!-- 次へボタン -->
        <a href="{{ route('dashboard') }}" 
        class="bg-gray-100 text-gray-700 px-4 py-2 rounded shadow hover:bg-gray-200 focus:bg-gray-300 transition transform hover:scale-105">
            次へ
        </a>
    </div>    

        <!-- モーダル (隠れた状態) -->
        <div id="modal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
            <div class="bg-white rounded-lg shadow p-6 w-96">
                <h3 class="text-xl font-semibold mb-4">フィードバック依頼の確認</h3>
                <p id="modalEmail" class="mb-4 text-gray-600"></p>
                <p class="mb-4 text-sm text-gray-500">
                    以下の内容でフィードバックを依頼します。
                </p>
                <div class="flex justify-end gap-2">
                    <button id="cancelButton" 
                        class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg shadow-sm hover:bg-gray-300 transition">
                        キャンセル
                    </button>
                    <button id="confirmButton" 
                        class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-sm hover:bg-blue-600 focus:bg-blue-700 transition">
                        送信する
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- スタイル -->
    <style>
        .container {
            max-width: 1200px;
        }

        input:focus {
            outline: none;
        }

        button {
            font-weight: 500;
            transition: all 0.3s ease-in-out;
        }

        button:hover {
            transform: scale(1.05); /* ホバー時に拡大 */
        }

        .shadow-sm {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .max-w-xl {
            max-width: 36rem; /* 最大幅を指定 */
        }
    </style>

    <!-- JavaScript -->
    <script>
        const modal = document.getElementById('modal');
        const emailInput = document.getElementById('emailInput');
        const modalEmail = document.getElementById('modalEmail');
        const requestButton = document.getElementById('requestButton');
        const cancelButton = document.getElementById('cancelButton');
        const confirmButton = document.getElementById('confirmButton');
        const pendingRequests = document.getElementById('pendingRequests');

        // 依頼ボタンのクリックイベント
        requestButton.addEventListener('click', () => {
            const email = emailInput.value.trim();
            if (!email) {
                alert('メールアドレスを入力してください。');
                return;
            }
            modalEmail.textContent = 宛先: ${email};
            modal.classList.remove('hidden'); // モーダルを表示
        });

        // キャンセルボタンのクリックイベント
        cancelButton.addEventListener('click', () => {
            modal.classList.add('hidden'); // モーダルを非表示
        });

        // 送信ボタンのクリックイベント
        confirmButton.addEventListener('click', () => {
            const email = emailInput.value.trim();
            if (!email) return;

            // 保留中のリストに追加
            const newRequest = document.createElement('div');
            newRequest.className = 'flex items-center justify-between bg-gray-100 p-3 rounded-lg shadow-sm';
            newRequest.innerHTML = <span>${email}</span><span class="text-yellow-500">保留中</span>;
            pendingRequests.appendChild(newRequest);

            // モーダルを非表示にし、入力をクリア
            modal.classList.add('hidden');
            emailInput.value = '';
        });
    </script>
</x-app-layout>