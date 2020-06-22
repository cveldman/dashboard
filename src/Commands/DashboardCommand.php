<?php

namespace Veldman\Dashboard\Commands;

use Illuminate\Console\Command;
use Veldman\Dashboard\Presets\CoreUI;
use Veldman\Dashboard\Presets\Vue;

class DashboardCommand extends Command
{
    protected $signature = 'dashboard';

    protected $description = 'Swap the back-end scaffolding for the application';

    public function handle()
    {
        Presets\Coreui::install();
        Presets\Vue::install();

        CoreUI::install();
        Vue::install();

        $this->info('Dashboard scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }
}
