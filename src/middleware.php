<?php
// Application middleware
namespace App\Middleware;

// e.g: $app->add(new \Slim\Csrf\Guard);

// Cookie
$app->add(new \SlimLittleTools\Middleware\Cookie($app->getContainer()));
