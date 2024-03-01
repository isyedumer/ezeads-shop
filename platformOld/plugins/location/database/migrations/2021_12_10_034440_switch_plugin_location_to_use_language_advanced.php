<?php

use Botble\PluginManagement\Services\PluginService;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    public function up(): void
    {
        if (is_plugin_active('language') && ! is_plugin_active('language-advanced') && File::isDirectory(plugin_path('language-advanced'))) {
            app(PluginService::class)->activate('language-advanced');
        }
    }

    public function down(): void
    {
    }
};
