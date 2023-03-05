<?php

namespace App\Services;

use Symfony\Component\Filesystem\Filesystem;

class MyLog
{

    public function __construct(private Filesystem $fs, private string $filename, private $logger)
    {
        
    }
    public function writenLog(string $message)
    {
        $this->logger->info($message);
        $this->fs->appendToFile($this->filename, $message . PHP_EOL);
    }
}
