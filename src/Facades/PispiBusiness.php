<?php

namespace PispiBusiness\PispiBusiness\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \PispiBusiness\PispiBusiness\PispiBusiness
 */
class PispiBusiness extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \PispiBusiness\PispiBusiness\PispiBusiness::class;
    }
}
