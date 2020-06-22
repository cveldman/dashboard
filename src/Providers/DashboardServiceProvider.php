<?php

namespace Veldman\Dashboard\Providers;

use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
use Veldman\Dashboard\Commands\DashboardCommand;
use Veldman\Dashboard\Presets\CoreUI;

class DashboardServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                DashboardCommand::class,
            ]);
        }

        $this->mergeConfigFrom(__DIR__.'/../../config/admin.php', 'admin');

        $this->registerBladeExtensions();

        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'admin');


        // Create frontend files
        UiCommand::macro('coreui', function (UiCommand $command) {
            CoreUI::install();

            $command->info('CoreUI scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');

        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');

        $this->loadFactoriesFrom(__DIR__.'/../../database/factories');

        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'admin');

        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'admin');

        $this->publishes([
            __DIR__.'/../../config/admin.php' => config_path('admin.php')
        ], 'config');

        $this->publishes([ __DIR__.'/../../public' => public_path('veldman/dashboard'),
        ], 'public');
    }

    protected function registerBladeExtensions()
    {
        $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {

            $bladeCompiler->directive('role', function ($arguments) {
                dd($arguments);
                list($role, $guard) = explode(',', $arguments.',');

                return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasRole({$role})): ?>";
            });

            $bladeCompiler->directive('elserole', function ($arguments) {
                list($role, $guard) = explode(',', $arguments.',');

                return "<?php elseif(auth({$guard})->check() && auth({$guard})->user()->hasRole({$role})): ?>";
            });

            $bladeCompiler->directive('endrole', function () {
                return '<?php endif; ?>';
            });

            /*

            $bladeCompiler->directive('hasrole', function ($arguments) {
                list($role, $guard) = explode(',', $arguments.',');

                return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasRole({$role})): ?>";
            });

            $bladeCompiler->directive('endhasrole', function () {
                return '<?php endif; ?>';
            });


            $bladeCompiler->directive('hasanyrole', function ($arguments) {
                list($roles, $guard) = explode(',', $arguments.',');

                return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasAnyRole({$roles})): ?>";
            });
            $bladeCompiler->directive('endhasanyrole', function () {
                return '<?php endif; ?>';
            });

            $bladeCompiler->directive('hasallroles', function ($arguments) {
                list($roles, $guard) = explode(',', $arguments.',');

                return "<?php if(auth({$guard})->check() && auth({$guard})->user()->hasAllRoles({$roles})): ?>";
            });
            $bladeCompiler->directive('endhasallroles', function () {
                return '<?php endif; ?>';
            });

            $bladeCompiler->directive('unlessrole', function ($arguments) {
                list($role, $guard) = explode(',', $arguments.',');

                return "<?php if(!auth({$guard})->check() || ! auth({$guard})->user()->hasRole({$role})): ?>";
            });
            $bladeCompiler->directive('endunlessrole', function () {
                return '<?php endif; ?>';
            });*/
        });
    }
}
