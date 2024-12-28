<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 経験データCRUDルート
Route::get('/test-create', [ExperienceController::class, 'testCreate']); // テスト用
Route::match(['get', 'post'], '/experiences', [ExperienceController::class, 'handleRequest'])->name('experiences.handle'); // GETとPOSTを統一
Route::get('/experiences/index', [ExperienceController::class, 'index'])->name('experiences.index'); // 一覧ページ
Route::get('/experiences/{id}/edit', [ExperienceController::class, 'edit'])->name('experiences.edit'); // 編集フォーム
Route::put('/experiences/{id}', [ExperienceController::class, 'update'])->name('experiences.update'); // データ更新
Route::delete('/experiences/{id}', [ExperienceController::class, 'destroy'])->name('experiences.destroy'); // データ削除

// その他ルート
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
});

require __DIR__.'/auth.php';
