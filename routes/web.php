<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Hotspot\GetHotspotController;
use App\Http\Controllers\MikrotikController;
use App\Http\Controllers\Ppp\GetPppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Routerboard\SystemController;
use App\Http\Controllers\TestConnectionController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::get('mikrotiks/{mikrotik:slug}', [MikrotikController::class, 'show'])->name('mikrotiks.show');
    Route::resource('mikrotiks', MikrotikController::class);

    Route::post('/testcon', [TestConnectionController::class, 'testConn'])->name('test-con');
    Route::post('/cek-online', [TestConnectionController::class, 'checkOnline'])->name('check-online');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //    response request
    Route::get('/mikrotik/hotspot/{mikrotik:slug}/get-hotspot-active', [GetHotspotController::class, 'getCountActive'])->name('hotspot.count');
    Route::get('/mikrotik/hotspot/{mikrotik:slug}/get-all-users', [GetHotspotController::class, 'getAllUsers'])->name('hotspot.users');

    Route::get('/mikrotik/ppp/{mikrotik:slug}/get-all-ppp-secrets', [GetPppController::class, 'getAllPppSecrets'])->name('ppp.secrets');
    Route::get('/mikrotik/ppp/{mikrotik:slug}/get-all-ppp-active', [GetPppController::class, 'getAllPppActive'])->name('ppp.active');

    Route::get('/mikrotik/resource/{mikrotik:slug}/get-resource',[SystemController::class,'routerResource'])->name('routerboard.resources');
});

require __DIR__.'/auth.php';
