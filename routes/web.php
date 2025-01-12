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
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


// 経験データCRUDルート（認証が必要）
Route::middleware(['auth'])->group(function () {
    Route::get('/test-create', [ExperienceController::class, 'testCreate']);
    Route::get('/experiences/index', [ExperienceController::class, 'index'])->name('experiences.index');
    Route::get('/experiences/create', [ExperienceController::class, 'create'])->name('experiences.create');
    Route::post('/experiences/store', [ExperienceController::class, 'store'])->name('experiences.store');
    Route::get('/experiences/{id}/edit', [ExperienceController::class, 'edit'])->name('experiences.edit');
    Route::put('/experiences/{id}', [ExperienceController::class, 'update'])->name('experiences.update');
    Route::delete('/experiences/{id}', [ExperienceController::class, 'destroy'])->name('experiences.destroy');
    Route::get('/experiences/chart', [ExperienceController::class, 'chart'])->name('experiences.chart');
});


// フィードバック関連のルート
Route::middleware(['auth'])->group(function () {
    // フィードバック一覧
    Route::get('/feedback/index', [FeedbackController::class, 'index'])->name('feedback.index');

    // フィードバックサマリー
    Route::get('/feedback/summary', [FeedbackController::class, 'summary'])->name('feedback.summary');

    // フィードバック作成
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');

    // フィードバック保存
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});

// **layouts.feedback に対応するルート**
Route::get('/layouts/feedback', function () {
    return view('layouts.feedback');
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

// ヘルプページのルート（ログイン必須）
Route::middleware(['auth'])->group(function () {
    Route::get('/help', function () {
        return view('help.index');
    })->name('help.index');

    Route::get('/help/faq', function () {
        return view('help.faq');
    })->name('help.faq');
});

// Breeze の認証ルート
require __DIR__ . '/auth.php';


