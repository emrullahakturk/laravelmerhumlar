<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerhumController;
use App\Http\Controllers\AdminMerhumController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;

// **Ana Sayfa**
Route::get('/', function () {
    return view('index');
})->name('home');

// **Merhumlar Listesi (Ziyaretçi)**
Route::get('/merhumlarimiz', [MerhumController::class, 'index'])->name('merhumlar');

// **Merhum Detay Sayfası (Ziyaretçi)**
Route::get('/merhumlar/{id}', [MerhumController::class, 'show'])->name('merhum-detay');

// **Admin Paneli Merhum CRUD İşlemleri - Sadece Giriş Yapmış Kullanıcılar İçin**
Route::prefix('admin')->middleware(['auth'])->group(function () {

   /* Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');*/

    Route::get('/merhumlar', [AdminMerhumController::class, 'index'])->name('admin.merhumlar.index');
    Route::get('/merhumlar/create', [AdminMerhumController::class, 'create'])->name('admin.merhumlar.create');
    Route::post('/merhumlar', [AdminMerhumController::class, 'store'])->name('admin.merhumlar.store');
    Route::get('/merhumlar/{id}/edit', [AdminMerhumController::class, 'edit'])->name('admin.merhumlar.edit');
    Route::put('/merhumlar/{id}', [AdminMerhumController::class, 'update'])->name('admin.merhumlar.update');
    Route::delete('/merhumlar/{id}', [AdminMerhumController::class, 'destroy'])->name('admin.merhumlar.destroy');

    // **Çıkış Yap Route**
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
});

// **Login Sayfası**
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

// **Register Sayfası**
Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest')->name('register');

// **Laravel Breeze Auth Rotaları**
require __DIR__.'/auth.php';
