<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\MoonShine\Controllers\ProfileController;

if (config('app.demo_mode', false)) {
    Route::moonshine(static function (Router $router) {
        $router->post('/profile', [ProfileController::class, 'store'])
            ->name('profile.store');
    });
}