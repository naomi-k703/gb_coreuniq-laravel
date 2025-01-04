<x-app-layout>
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">よくある質問</h1>

        {{-- 質問一覧 --}}
        <ul class="space-y-4">
            <!-- 質問1 -->
            <li class="bg-gray-50 p-4 rounded-lg shadow">
                <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer(this)">
                    <div class="flex items-center space-x-2">
                        <div class="bg-blue-500 text-white rounded-full w-6 h-6 flex justify-center items-center">
                            Q
                        </div>
                        <p class="text-gray-800 font-semibold">
                            パスワードを忘れた場合はどうすればいいですか？
                        </p>
                    </div>
                    <button class="text-blue-500 font-bold text-lg">+</button>
                </div>
                <div class="hidden mt-2 text-gray-700">
                    A: ログイン画面の「パスワードをリセット」をクリックしてください。
                </div>
            </li>
            <!-- 質問2 -->
            <li class="bg-gray-50 p-4 rounded-lg shadow">
                <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer(this)">
                    <div class="flex items-center space-x-2">
                        <div class="bg-blue-500 text-white rounded-full w-6 h-6 flex justify-center items-center">
                            Q
                        </div>
                        <p class="text-gray-800 font-semibold">
                            アカウントを削除するにはどうすればいいですか？
                        </p>
                    </div>
                    <button class="text-blue-500 font-bold text-lg">+</button>
                </div>
                <div class="hidden mt-2 text-gray-700">
                    A: プロフィールページで「アカウント削除」を選択してください。
                </div>
            </li>
            <!-- 質問3 -->
            <li class="bg-gray-50 p-4 rounded-lg shadow">
                <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer(this)">
                    <div class="flex items-center space-x-2">
                        <div class="bg-blue-500 text-white rounded-full w-6 h-6 flex justify-center items-center">
                            Q
                        </div>
                        <p class="text-gray-800 font-semibold">
                            メール通知をオフにする方法は？
                        </p>
                    </div>
                    <button class="text-blue-500 font-bold text-lg">+</button>
                </div>
                <div class="hidden mt-2 text-gray-700">
                    A: 設定ページで通知オプションを変更してください。
                </div>
            </li>
        </ul>
    </div>

    {{-- JavaScript --}}
    <script>
        function toggleAnswer(element) {
            const answer = element.nextElementSibling;
            const button = element.querySelector('button');

            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                button.textContent = '-';
            } else {
                answer.classList.add('hidden');
                button.textContent = '+';
            }
        }
    </script>
</x-app-layout>
