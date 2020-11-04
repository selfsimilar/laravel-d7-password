<?php namespace Selfsimilar\D7Password\Facades;

use Illuminate\Support\Facades\Facade;

class D7Password extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'Selfsimilar\D7Password\Contracts\D7Password';
    }

}