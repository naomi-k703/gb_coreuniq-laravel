<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;

// ウェルカムページ
Route::get('/', function () {
    return view('welcome');
});

// ダッシュボード
Route::get('/dashboard', [ExperienceController::class, 'dashboard'])
    ->middleware(['auth', 'verified']) // ログイン必須
    ->name('dashboard');

// 経験データCRUDルート
Route::group([], function () {
    // テスト用ルート
    Route::get('/test-create', [ExperienceController::class, 'testCreate']); 

    // 一覧表示
    Route::get('/experiences/index', [ExperienceController::class, 'index'])->name('experiences.index'); 

    // 新規作成と保存処理
    Route::get('/experiences/create', [ExperienceController::class, 'create'])->name('experiences.create'); // 新規作成ページ
    Route::post('/experiences', [ExperienceController::class, 'store'])->name('experiences.store'); // 新しいデータの保存

    // 編集と更新
    Route::get('/experiences/{id}/edit', [ExperienceController::class, 'edit'])->name('experiences.edit'); // 編集フォーム
    Route::put('/experiences/{id}', [ExperienceController::class, 'update'])->name('experiences.update'); // データ更新

    // 削除
    Route::delete('/experiences/{id}', [ExperienceController::class, 'destroy'])->name('experiences.destroy'); // データ削除

    // 感情曲線表示
    Route::get('/experiences/chart', [ExperienceController::class, 'chart'])->name('experiences.chart'); // 感情曲線ページ
});

// プロフィール関連のルート
Route::middleware(['auth'])->group(function () {
    // プロフィールの表示と編集
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// その他のルート
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
});

require __DIR__.'/auth.php';
