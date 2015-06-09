<?php

namespace Klsandbox\ClearCommands;

use Config;
use Illuminate\Console\Command;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;

// From https://gist.github.com/lucasmichot/7313220
class ClearCachedBlade extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'clear:cachedblade';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush the application Blade engine cache.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire() {
        $fileSystem = new Filesystem();

        $fileSystem->remove(Finder::create()->in(Config::get('view.compiled'))->files());

        $this->comment('Cleard compiled views');
    }

}
