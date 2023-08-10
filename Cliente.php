<?php 

require_once('ExceptionHandler.php');
require_once('Logger.php');
require_once('Mailer.php');

$handler = new ExceptionHandler();

$handler->attach(new Logger);
$handler->attach(new Mailer);

set_exception_handler([$handler, 'handle']);