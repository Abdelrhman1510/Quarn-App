<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurahController;
use App\Http\Controllers\MushafController;  // لو عندك الكنترولر ده
use App\Http\Controllers\HadithController;
use App\Http\Controllers\AzkarController;
use App\Http\Controllers\RadioController;
use Illuminate\Support\Facades\File;

Route::get('/', function () {
    return view('home');  // Redirect to splash screen
})->name('home');

// صفحة الفهرس (تفسير القرآن)
Route::get('/index', [SurahController::class, 'index'])->name('surahs.index');

// عرض سورة واحدة مع التفسير
Route::get('/surah/{id}', [SurahController::class, 'show'])->name('surahs.show');

// صفحة المصحف الكامل (صفحة المصحف التي تحوي تصفح الآيات بشكل كتاب)


// -- اختياري: صفحة سبلاش أو شاشة تحميل -- 
Route::get('/splash', function () {
    session(['seen_splash' => true]);
    return view('splash');
})->name('splash');

Route::get('/mushaf/view', [MushafController::class, 'index'])->name('mushaf.full');

Route::get('/pray/timeline', function () {
    return view('pray');
})->name('pray.timeline');

Route::get('/azkar', function () {
    return view('azkar');
})->name('azkar');

Route::get('/hadiths', [HadithController::class, 'index'])->name('hadiths.index');
Route::get('/hadiths/{id}', [HadithController::class, 'show'])->name('hadiths.show');

Route::get('qabla', function () {
    return view('qabla');
})->name('qabla');
Route::get('/azkar', [AzkarController::class, 'index'])->name('azkar');
Route::get('/radios', [RadioController::class, 'index'])->name('radio');


