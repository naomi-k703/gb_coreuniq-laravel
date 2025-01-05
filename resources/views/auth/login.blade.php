<x-guest-layout>
    <!-- 背景スタイルを追加 -->
    <style>
        body {
            background: linear-gradient(to bottom, #eef2ff, #ffffff); /* Welcomeページと同じ背景色 */
        }

        .login-form {
            background-color: #ffffff; /* 白い背景 */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* 軽い影 */
            border-radius: 10px; /* 丸み */
            padding: 2rem; /* 内側の余白 */
        }

        .btn-primary {
            background-color: #000000; /* 黒い背景 */
            color: #ffffff; /* 白い文字 */
            padding: 0.75rem 1.5rem; /* ボタン内の余白 */
            border-radius: 5px; /* ボタンの丸み */
            font-weight: bold; /* 太字 */
            text-transform: uppercase; /* 英字を大文字に */
            transition: background-color 0.2s ease-in-out; /* ホバー時のスムーズな効果 */
        }

        .btn-primary:hover {
            background-color: #333333; /* ホバー時の色 */
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333333;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>

    <!-- ロゴ -->
    <!--<x-application-logo class="block mx-auto h-16 w-auto" />-->

    <!-- 説明文 -->
    <div class="text-center mt-4">
        <p class="text-sm text-gray-600">あなたの成長を加速させるプラットフォーム</p>
    </div>

    <!-- フォーム -->
    <form method="POST" action="{{ route('login') }}" class="login-form max-w-md mx-auto">
        @csrf

        <div class="form-title">ログイン</div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Submit Section -->
        <div class="flex items-center justify-end mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="btn-primary ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
