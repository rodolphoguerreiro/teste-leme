<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\Http\ServerRequest;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function(RouteBuilder $routes){
    $routes->connect('/', ['controller' => 'pages', 'action' => 'index']);

    $routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
