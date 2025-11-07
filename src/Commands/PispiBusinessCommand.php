<?php

namespace PispiBusiness\PispiBusiness\Commands;

use Illuminate\Console\Command;

class PispiBusinessCommand extends Command
{
    public $signature = 'pispi-business-sdk';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
