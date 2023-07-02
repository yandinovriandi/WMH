<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Hotspot\GetHotspotController;
use App\Http\Controllers\Hotspot\GetIncomeController;
use App\Http\Controllers\Hotspot\VoucherActionController;
use App\Http\Controllers\Hotspot\VoucherController;
use App\Http\Controllers\MikrotikController;
use App\Http\Controllers\Ppp\GetPppController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Routerboard\SystemController;
use App\Http\Controllers\TestConnectionController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

$supported_language = ['en', 'id'];

Route::redirect('/', '/login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('lang/update/{locale}', function ($locale) {
        if ($locale) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        }
        return redirect()->route('dashboard');
    })->name('update-language');

    Route::get('mikrotiks/{mikrotik:slug}', [MikrotikController::class, 'show'])->name('mikrotiks.show');
    Route::resource('mikrotiks', MikrotikController::class);

    Route::post('/testcon', [TestConnectionController::class, 'testConn'])->name('test-con');
    Route::post('/cek-online', [TestConnectionController::class, 'checkOnline'])->name('check-online');

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route::get('', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('', [ProfileController::class, 'update'])->name('update');
        Route::delete('', [ProfileController::class, 'destroy'])->name('destroy');

        Route::get('security', [ProfileController::class, 'security'])->name('security');
    });

    Route::get('/vouchers/{mikrotik:slug}/lists', [VoucherController::class, 'voucher'])->name('voucher.list');

    //    response request
    Route::put('/voucher/mikrotik/{mikrotik:slug}/enable',[VoucherActionController::class,'enableOne'])->name('voucher.enable');
    Route::put('/voucher/mikrotik/{mikrotik:slug}/disable',[VoucherActionController::class,'disableOne'])->name('voucher.disable');
    Route::delete('/voucher/mikrotik/{mikrotik:slug}/delete',[VoucherActionController::class,'deleteOne'])->name('voucher.delete');

    Route::get('/mikrotik/hotspot/{mikrotik:slug}/get-hotspot-active', [GetHotspotController::class, 'getCountActive'])->name('hotspot.count');
    Route::get('/mikrotik/hotspot/{mikrotik:slug}/get-all-users', [GetHotspotController::class, 'getAllUsers'])->name('hotspot.users');

    Route::get('/mikrotik/ppp/{mikrotik:slug}/get-all-ppp-secrets', [GetPppController::class, 'getAllPppSecrets'])->name('ppp.secrets');
    Route::get('/mikrotik/ppp/{mikrotik:slug}/get-all-ppp-active', [GetPppController::class, 'getAllPppActive'])->name('ppp.active');

    Route::get('/mikrotik/resource/{mikrotik:slug}/get-resource', [SystemController::class, 'routerResource'])->name('routerboard.resources');
    Route::get('/mikrotik/traffic/{mikrotik:slug}/get-monitoring', [SystemController::class, 'mikrotikTrafficInterface'])->name('mikrotik.traffic-interface');
    Route::get('/mikrotik/{mikrotik:slug}/time', [SystemController::class, 'getTimeRouter'])->name('mikrotik.time');

    Route::get('/mikrotik/income/{mikrotik:slug}/income-today', [GetIncomeController::class, 'todayIncome'])->name('income.today');
});

require __DIR__.'/auth.php';
