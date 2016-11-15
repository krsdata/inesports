<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use File;

class ConfigServiceProvider extends ServiceProvider {

    /**
     * Overwrite any vendor / package configuration.
     *
     * This service provider is intended to provide a convenient location for you
     * to overwrite any "vendor" or package configuration that you may want to
     * modify before the application handles the incoming request / command.
     *
     * @return void
     */
    public function register()
    {
        $filename   = storage_path('app/database.ini');
        $key        = 'database.connections.mysql';
        if (File::exists($filename)) {
            $settings = parse_ini_file($filename);

            config([
                $key.'.host'        => $settings['host'],
                $key.'.database'    => $settings['database'],
                $key.'.username'    => $settings['username'],
                $key.'.password'    => $settings['password'],
            ]);
        }
    }

}
