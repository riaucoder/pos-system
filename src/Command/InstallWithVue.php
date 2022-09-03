<?php

namespace Riaucoder\PosSystem\Command;


//use Symfony\Component\Process\Process;

use Faker\Core\File;
use Illuminate\Filesystem\Filesystem;

trait InstallWithVue
{

    protected function installVue()
    {
//        // Install Inertia...
        $this->requireComposerPackages('inertiajs/inertia-laravel:^0.6.3', 'laravel/sanctum:^2.8', 'tightenco/ziggy:^1.0');
//
//        // NPM Packages...
        $this->updateNodePackages(function ($packages) {
            return [
                    '@inertiajs/inertia' => '^0.11.0',
                    '@inertiajs/inertia-vue3' => '^0.6.0',
                    '@inertiajs/progress' => '^0.2.7',
                    '@tailwindcss/forms' => '^0.5.2',
                    '@vitejs/plugin-vue' => '^3.0.0',
                    'autoprefixer' => '^10.4.2',
                    'postcss' => '^8.4.6',
                    'tailwindcss' => '^3.1.0',
                    'vue' => '^3.2.31',
                    'daisyui' => '^2.24.0',
                ] + $packages;
        });

        // Controllers...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers/Auth'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia-common/app/Http/Controllers/Auth', app_path('Http/Controllers/Auth'));
        copy(__DIR__.'/../../stubs/default/app/Http/Controllers/HomeController.php', app_path('Http/Controllers/HomeController.php'));
        copy(__DIR__.'/../../stubs/default/app/Http/Controllers/DashboardController.php', app_path('Http/Controllers/DashboardController.php'));

        // Requests...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests/Auth'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/default/App/Http/Requests/Auth', app_path('Http/Requests/Auth'));

        // Middleware...
        $this->installMiddlewareAfter('SubstituteBindings::class', '\App\Http\Middleware\HandleInertiaRequests::class');

        copy(__DIR__.'/../../stubs/inertia-common/app/Http/Middleware/HandleInertiaRequests.php', app_path('Http/Middleware/HandleInertiaRequests.php'));

        // Views...
        copy(__DIR__.'/../../stubs/inertia-common/resources/views/app.blade.php', resource_path('views/app.blade.php'));

        // Components + Pages...
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Components'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Shared'));

        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia-vue/resources/js/Components', resource_path('js/Components'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia-vue/resources/js/Layouts', resource_path('js/Layouts'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia-vue/resources/js/Pages', resource_path('js/Pages'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia-vue/resources/js/Shared', resource_path('js/Shared'));

        // Tests...
        $this->installTests();

        // Routes...

//        $this->replaceInFile('/home', '/dashboard', resource_path('js/Pages/Welcome.vue'));
//        $this->replaceInFile('Home', 'Dashboard', resource_path('js/Pages/Welcome.vue'));

        // Tailwind / Vite...
        copy(__DIR__.'/../../stubs/default/resources/css/app.css', resource_path('css/app.css'));
        copy(__DIR__.'/../../stubs/default/postcss.config.js', base_path('postcss.config.js'));
        copy(__DIR__.'/../../stubs/inertia-common/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__.'/../../stubs/inertia-common/jsconfig.json', base_path('jsconfig.json'));
        copy(__DIR__.'/../../stubs/inertia-vue/vite.config.js', base_path('vite.config.js'));
        copy(__DIR__.'/../../stubs/inertia-vue/resources/js/app.js', resource_path('js/app.js'));
//
//        if ($this->option('ssr')) {
//            $this->installInertiaVueSsrStack();
//        }

        $this->runCommands(['npm install', 'npm run build']);

        $this->line('');
        $this->components->info('Breeze scaffolding installed successfully.');

        copy(__DIR__.'/../../stubs/default/routes/web.php', base_path('routes/web.php'));
        $this->replaceInFile('/home', '/dashboard', app_path('Providers/RouteServiceProvider.php'));

    }

}
