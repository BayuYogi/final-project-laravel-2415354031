<?php

use Illuminate\Support\Facades\Route;
// Hubungkan ke Web Controller kamu
use App\Http\Controllers\CustomerWebController;

// Halaman utama (/) otomatis dialihkan langsung ke halaman Customers
Route::get('/', function () {
    return redirect()->route('customers.index');
});

// Route Utama Halaman Customers (Mengambil data dari DB)
Route::get('/customers', [CustomerWebController::class, 'index'])->name('customers.index');

// PERBAIKAN: Route POST untuk memproses penyimpanan data dari Modal Add Customer
Route::post('/customers', [CustomerWebController::class, 'store'])->name('customers.store');

// Halaman Users (Temporary)
Route::get('/users', function () {
    return "<h1>Halaman Users (Coming Soon)</h1><a href='".route('customers.index')."'>Kembali ke Customers</a>";
})->name('users.index');

// Halaman Services (Temporary)
Route::get('/services', function () {
    return "<h1>Halaman Services (Coming Soon)</h1><a href='".route('customers.index')."'>Kembali ke Customers</a>";
})->name('services.index');

// Halaman Subscriptions
Route::get('/subscriptions', function () {
    return view('subscriptions.index');
})->name('subscriptions.index');

// Halaman Login / Auth Dummy
Route::get('/login', function () {
    return "<div style='text-align:center; margin-top:100px;'>
                <h1>Halaman Login (ERP Auth)</h1>
                <p>Anda telah keluar dari sistem.</p>
                <a href='".route('customers.index')."' style='padding:10px 20px; background:#111827; color:#fff; text-decoration:none; border-radius:8px;'>Masuk Kembali</a>
            </div>";
})->name('login');

// Route Action Logout
Route::post('/logout', function () {
    return redirect()->route('login');
})->name('logout');