<?php namespace Selfsimilar\D7Password;

use Selfsimilar\D7Password\Hasher as D7Hasher;
use Illuminate\Support\ServiceProvider;

class D7PasswordProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * Check your installation of Drupal for the value of `password_count_log2`
     * (e.g. `drush variable-get password_count_log2`). If it is set and
     * different than 15, you will need to pass it to the PasswordHash()
     * constructor.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Selfsimilar\D7Password\Contracts\D7Password', function () {
            return new D7Password(new D7Hasher());
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Selfsimilar\D7Password\Contracts\D7Password'];
    }

}