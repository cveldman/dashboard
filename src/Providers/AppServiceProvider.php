<?php

namespace Veldman\Dashboard\Providers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
use Veldman\Dashboard\Commands\DashboardCommand;
use Veldman\Dashboard\Presets\CoreUI;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        RedirectResponse::macro('error', function ($message) {
            return $this->with('status', ['type' => 'danger', 'message' => __($message)]);
        });

        RedirectResponse::macro('warning', function ($message) {
            return $this->with('status', ['type' => 'warning', 'message' => __($message)]);
        });

        RedirectResponse::macro('success', function ($message) {
            return $this->with('status', ['type' => 'success', 'message' => __($message)]);
        });

        RedirectResponse::macro('info', function ($message) {
            return $this->with('status', ['type' => 'info', 'message' => __($message)]);
        });
    }
}
