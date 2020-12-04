<?php

namespace Erickzh\FirstPackage\Commands;

use Illuminate\Console\Command;

class FirstPackageCommand extends Command
{
    public $signature = 'first-package';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
