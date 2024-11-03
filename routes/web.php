<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
    Route::inertia('/formlayout', 'sakai-pages/uikit/FormLayout')->name('formlayout');
    Route::inertia('/input', 'sakai-pages/uikit/InputDoc')->name('input');
    Route::inertia('/button', 'sakai-pages/uikit/ButtonDoc')->name('button');
    Route::inertia('/table', 'sakai-pages/uikit/TableDoc')->name('table');
    Route::inertia('/list', 'sakai-pages/uikit/ListDoc')->name('list');
    Route::inertia('/tree', 'sakai-pages/uikit/TreeDoc')->name('tree');
    Route::inertia('/panel', 'sakai-pages/uikit/PanelsDoc')->name('panel');
    Route::inertia('/overlay', 'sakai-pages/uikit/OverlayDoc')->name('overlay');
    Route::inertia('/media', 'sakai-pages/uikit/MediaDoc')->name('media');
    Route::inertia('/menu', 'sakai-pages/uikit/MenuDoc')->name('menu');
    Route::inertia('/message', 'sakai-pages/uikit/MessagesDoc')->name('message');
    Route::inertia('/file', 'sakai-pages/uikit/FileDoc')->name('file');
    Route::inertia('/charts', 'sakai-pages/uikit/ChartDoc')->name('charts');
    Route::inertia('/timeline', 'sakai-pages/uikit/TimelineDoc')->name('timeline');
    Route::inertia('/misc', 'sakai-pages/uikit/MiscDoc')->name('misc');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
