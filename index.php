<?php

require __DIR__.'/app/includes/app.php';

use App\Http\Router;

$obRouter = new Router(URL);

include __DIR__.'/app/routes/pages.php';


$obRouter->run()->sendResponse();



