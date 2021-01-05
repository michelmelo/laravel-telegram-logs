<?php

namespace Michelmelo\LaravelTelegramLogs;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Michelmelo\LaravelTelegramLogs\LaravelTelegramLogs
 */
class LaravelTelegramLogsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-telegram-logs';
    }
}
