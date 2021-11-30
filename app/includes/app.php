<?php

require __DIR__ . '/../../vendor/autoload.php';

use App\Utils\View;
use App\Database\Database;
include __DIR__ . '/../../Environment.php';

Environment::load(__DIR__ . '/../../');


define('URL', getenv('URL'));

View::init([
  'URL' => URL
]);
