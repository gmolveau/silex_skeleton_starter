<?php
//main controller
require_once __DIR__.'/vendor/autoload.php';

$app = new Silex\Application();

// in prof, comment the next line
require_once __DIR__.'/app/config/dev.php';

require_once __DIR__.'/app/app.php';

require_once __DIR__.'/app/routes.php'; 

$app->run();