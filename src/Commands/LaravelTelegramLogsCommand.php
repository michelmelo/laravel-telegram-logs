<?php

namespace Michelmelo\LaravelTelegramLogs\Commands;

use Illuminate\Console\Command;

class LaravelTelegramLogsCommand extends Command
{
    public $signature = 'laravel-telegram-logs';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
