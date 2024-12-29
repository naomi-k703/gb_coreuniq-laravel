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
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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
});

// その他のルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
});

require __DIR__.'/auth.php';
