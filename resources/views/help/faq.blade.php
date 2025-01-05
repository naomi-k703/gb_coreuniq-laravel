<x-app-layout>
    <div class="bg-gradient-to-b from-[#eef6fc] to-[#ffffff] min-h-screen py-10">
        <div class="max-w-4xl mx-auto bg-white shadow-md rounded-md">
            <h1 class="text-3xl font-bold text-center text-gray-800 py-6">よくあるご質問</h1>
            <!-- タブのデザイン -->
            <div class="flex border-b text-center bg-[#eef6fc] rounded-t-md">
                <button
                    class="flex-1 py-3 bg-white text-[#4A90E2] font-bold border-b-4 border-[#4A90E2] hover:bg-[#e0eff9]">
                    製品について
                </button>
                <button
                    class="flex-1 py-3 bg-[#eef6fc] text-gray-600 hover:bg-[#e0eff9] hover:text-[#4A90E2]">
                    操作方法について
                </button>
                <button
                    class="flex-1 py-3 bg-[#eef6fc] text-gray-600 hover:bg-[#e0eff9] hover:text-[#4A90E2]">
                    サポートについて
                </button>
                <button
                    class="flex-1 py-3 bg-[#eef6fc] text-gray-600 hover:bg-[#e0eff9] hover:text-[#4A90E2]">
                    ライセンスについて
                </button>
            </div>
            <!-- 質問と回答 -->
            <div class="p-6 space-y-4">
                <div class="bg-[#eef6fc] shadow-md rounded-md p-4">
                    <button
                        class="flex justify-between items-center w-full text-left text-gray-800 font-semibold focus:outline-none"
                        onclick="toggleFaq(this)">
                        Q: パスワードを忘れた場合はどうすればいいですか？
                        <span class="text-[#4A90E2]">+</span>
                    </button>
                    <div class="mt-2 text-gray-600 hidden">
                        ログイン画面の「パスワードをリセット」をクリックしてください。
                    </div>
                </div>
                <div class="bg-[#eef6fc] shadow-md rounded-md p-4">
                    <button
                        class="flex justify-between items-center w-full text-left text-gray-800 font-semibold focus:outline-none"
                        onclick="toggleFaq(this)">
                        Q: アカウントを削除するにはどうすればいいですか？
                        <span class="text-[#4A90E2]">+</span>
                    </button>
                    <div class="mt-2 text-gray-600 hidden">
                        プロフィールページで「アカウント削除」を選択してください。
                    </div>
                </div>
                <div class="bg-[#eef6fc] shadow-md rounded-md p-4">
                    <button
                        class="flex justify-between items-center w-full text-left text-gray-800 font-semibold focus:outline-none"
                        onclick="toggleFaq(this)">
                        Q: メール通知をオフにする方法は？
                        <span class="text-[#4A90E2]">+</span>
                    </button>
                    <div class="mt-2 text-gray-600 hidden">
                        設定ページで通知オプションを変更してください。
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tailwind CSSを適用 -->
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');

        /* ボタンのホバー効果追加 */
        button:hover {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
    </style>

    <script>
        function toggleFaq(button) {
            const answer = button.nextElementSibling;
            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                button.querySelector('span').textContent = '-';
            } else {
                answer.classList.add('hidden');
                button.querySelector('span').textContent = '+';
            }
        }
    </script>
</x-app-layout>
