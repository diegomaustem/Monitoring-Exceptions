<?php 

class Logger implements \SplObserver {

    const ARQUIVO_LOG = 'log.txt';

    public function __construct()
    {
        touch(self::ARQUIVO_LOG);
    }

    public function update(\SplSubject $subject):void 
    {
        file_put_contents(self::ARQUIVO_LOG, $subject->getMessage() . PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}