<?php

use App\Http\Controllers\Dash\FeatureController;
use App\Http\Controllers\Dash\PlanController;
use App\Http\Controllers\Dash\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Subscription\SubscriptionController;
use Illuminate\Support\Facades\Route;

Route::get('subscriptions/resume', [SubscriptionController::class, 'resume'])->name('subscriptions.resume');
Route::get('subscriptions/cancel', [SubscriptionController::class, 'cancel'])->name('subscriptions.cancel');
Route::get('subscriptions/invoice/{invoice}', [SubscriptionController::class, 'downloadInvoice'])->name('subscriptions.invoice.download');
Route::get('subscriptions/account', [SubscriptionController::class, 'account'])->name('subscriptions.account');
Route::post('subscriptions/store', [SubscriptionController::class, 'store'])->name('subscriptions.store')->middleware(['check.choice.plan']);
Route::get('subscriptions/checkout', [SubscriptionController::class, 'index'])->name('subscriptions.checkout')->middleware(['check.choice.plan']);
Route::get('subscriptions/premium', [SubscriptionController::class, 'premium'])->name('subscriptions.premium')->middleware(['subscribed']);

Route::prefix('dash')->middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('dash.profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('dash.profile.update');
    Route::put('profile/redefinePass', [ProfileController::class, 'redefinePass'])->name('dash.profile.redefinePass');

    Route::get('plans', [PlanController::class, 'index'])->name('dash.plans');
    Route::get('plans/create', [PlanController::class, 'create'])->name('dash.plans.create');
    Route::post('plans/store', [PlanController::class, 'store'])->name('dash.plans.store');
    Route::delete('plans/destroy/{id}', [PlanController::class, 'destroy'])->name('dash.plans.destroy');
    Route::get('plans/edit/{id}', [PlanController::class, 'edit'])->name('dash.plans.edit');
    Route::put('plans/update/{id}', [PlanController::class, 'update'])->name('dash.plans.update');


    Route::get('features/{plan_id}', [FeatureController::class, 'index'])->name('dash.features');
    Route::get('features/create/{plan_id}', [FeatureController::class, 'create'])->name('dash.features.create');
    Route::post('features/store/{plan_id}', [FeatureController::class, 'store'])->name('dash.features.store');
    Route::delete('features/destroy/{id}', [FeatureController::class, 'destroy'])->name('dash.features.destroy');
    Route::get('features/edit/{id}', [FeatureController::class, 'edit'])->name('dash.features.edit');
    Route::put('features/update/{id}', [FeatureController::class, 'update'])->name('dash.features.update');

});

Route::get('/assinar/{url}', [SiteController::class, 'createSessionPlan'])->name('choice.plan');
Route::get('/', [SiteController::class, 'index'])->name('site.home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
