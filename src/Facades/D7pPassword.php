<?php namespace Selfsimilar\D7Password\Facades;

use Illuminate\Support\Facades\Facade;

class D7Password extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Selfimilar\D7Password\Contracts\D7Password';
    }

}