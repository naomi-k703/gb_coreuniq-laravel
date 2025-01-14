<x-guest-layout>
    <!-- 背景スタイルを追加 -->
    
    <style>
        /* 全体の背景 */
        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #f7f8fa, #ffffff); /* 上から下にかけての淡いグレー */
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* フォーム全体のデザイン */
        .login-form {
            background: #ffffff; /* 純白の背景 */
            border-left: 6px solid #cccccc; /* 淡いグレーのアクセント */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05); /* ごく控えめな影 */
            border-radius: 16px; /* 丸みを強調 */
            padding: 2.5rem;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        /* フォームタイトル */
        .form-title {
            font-size: 1.75rem;
            font-weight: bold;
            color: #666666; /* 少し濃いグレー */
            margin-bottom: 1rem;
        }

        /* 説明文 */
        p {
            font-size: 1rem;
            color: #777777; /* 中間グレー */
            margin-bottom: 1.5rem;
        }

        /* ボタンのデザイン */
        

        .btn-primary {
            background-color: #666666; /* ボタン背景色 */
            color: #fff; /* テキスト色 */
            padding: 0.8rem 1.6rem; /* ボタンの内側余白 */
            font-size: 1rem; /* テキストサイズ */
            font-weight: bold; /* テキストの太さ */
            border: none; /* 枠線をなくす */
            border-radius: 8px; /* ボタンの丸み */
            cursor: pointer; /* マウスオーバー時のカーソル */
            display: flex; /* フレックスボックスを有効化 */
            justify-content: center; /* 水平方向に中央揃え */
            align-items: center; /* 垂直方向に中央揃え */
            transition: background-color 0.3s ease, transform 0.2s ease; /* アニメーション */
            width: 100%; /* ボタン幅を100%に設定 */
            height: auto; /* 自動調整で高さを設定 */
        }


        .btn-primary:hover {
            background-color: #555555; /* ホバー時に濃いグレー */
            transform: scale(1.02); /* ホバー時にわずかに拡大 */
        }

        /* リンクのデザイン */
        a {
            font-size: 0.85rem;
            color: #666666; /* 中間グレー */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #333333; /* ホバー時に濃いグレー */
        }
    </style>


    <!-- ロゴ -->
    <!--<x-application-logo class="block mx-auto h-16 w-auto" />-->

    <!-- 説明文 -->
    <div class="text-center mt-4">
        <p class="text-sm text-gray-800">あなたの成長を加速させるプラットフォーム</p>
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
