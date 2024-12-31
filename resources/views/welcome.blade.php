{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Core Uniq</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Arial', sans-serif;
                background: linear-gradient(to bottom, #eaf4ff, #ffffff);
                color: #333;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }

            .container {
                text-align: center;
            }

            h1 {
                font-size: 2.5rem;
                font-weight: bold;
                margin-bottom: 20px;
            }

            p {
                font-size: 1.2rem;
                margin-bottom: 40px;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }

            .buttons {
                display: flex;
                justify-content: center;
                gap: 20px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 1rem;
                font-weight: bold;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .btn-black {
                background-color: #000;
                color: #fff;
                transition: background-color 0.3s ease;
            }

            .btn-black:hover {
                background-color: #333;
            }

            .btn-white {
                background-color: #fff;
                color: #000;
                border: 2px solid #000;
                transition: background-color 0.3s ease, color 0.3s ease;
            }

            .btn-white:hover {
                background-color: #f0f0f0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- タイトル -->
            <h1>Core Uniqへようこそ</h1>
            
            <!-- サブタイトル -->
            <p>
                あなたの独自の強みを発見し、キャリアを加速させましょう。
                Core Uniqは、あなたの潜在能力を引き出し、成長を支援します。
            </p>

            <!-- ボタンエリア -->
            <div class="buttons">
                @if (Route::has('login'))
                    @auth
                        <!-- 認証済みのユーザー用のDashboardリンク -->
                        <a href="{{ url('/dashboard') }}" 
                           class="btn btn-black">
                            Dashboard
                        </a>
                    @else
                        <!-- 未認証ユーザー向けのログインリンク -->
                        <a href="{{ route('login') }}" 
                           class="btn btn-black">
                            ログイン
                        </a>

                        <!-- 新規登録ボタン -->
                        <a href="{{ route('register') }}" 
                           class="btn btn-white">
                            新規登録
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </body>
</html>
