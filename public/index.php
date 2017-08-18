<?php

use PHPFin\Application;
use PHPFin\Plugins\RoutePlugin;
use PHPFin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/home', function() {
    echo "Mostrando a home!!";
});
?>
