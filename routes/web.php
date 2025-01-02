<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

// ウェルカムページ
Route::get('/', function () {
    return view('welcome');
});

// ダッシュボード
Route::get('/dashboard', [ExperienceController::class, 'dashboard'])
    ->middleware(['auth', 'verified']) // ログイン必須
    ->name('dashboard'); // ダッシュボードページのルート名

// 経験データCRUDルート
Route::group([], function () {
    Route::get('/test-create', [ExperienceController::class, 'testCreate']);
    Route::get('/experiences/index', [ExperienceController::class, 'index'])->name('experiences.index');
    Route::get('/experiences/create', [ExperienceController::class, 'create'])->name('experiences.create');
    Route::post('/experiences', [ExperienceController::class, 'store'])->name('experiences.store');
    Route::get('/experiences/{id}/edit', [ExperienceController::class, 'edit'])->name('experiences.edit');
    Route::put('/experiences/{id}', [ExperienceController::class, 'update'])->name('experiences.update');
    Route::delete('/experiences/{id}', [ExperienceController::class, 'destroy'])->name('experiences.destroy');
    Route::get('/experiences/chart', [ExperienceController::class, 'chart'])->name('experiences.chart');
});

// フィードバック関連のルート
Route::middleware(['auth'])->group(function () {
    Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});

// **`layouts.feedback` に対応するルートを追加**
Route::get('/layouts/feedback', function () {
    return view('layouts.feedback'); // フィードバックのレイアウトページを表示
})->name('layouts.feedback');

// プロフィール関連のルート
Route::middleware(['auth'])->group(function () {
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

// Breeze の認証ルート
require __DIR__.'/auth.php';
