<?php

namespace Veldman\Dashboard\Presets;

use Laravel\Ui\Presets\Preset;

class CoreUI extends Preset
{
    public static function install()
    {
        static::updatePackages();
        static::updateWebpackConfiguration();
        static::updateSass();
        static::updateBootstrapping();
        static::removeNodeModules();
    }

    protected static function updatePackageArray(array $packages)
    {
        return [
            '@coreui/coreui' => '^3.2.0',
            '@popperjs/core' => '^2.4.2',
            'perfect-scrollbar' => '^1.5.0',
            'vue-grid-layout' => '^2.3.7'
        ] + $packages;
    }

    protected static function updateSass()
    {
        copy(__DIR__.'/coreui-stubs/admin.scss', resource_path('sass/admin.scss'));
    }

    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/coreui-stubs/admin.js', resource_path('js/admin.js'));
    }

    protected static function updateWebpackConfiguration()
    {
        copy(__DIR__.'/coreui-stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }
}
