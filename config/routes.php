<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'RoleAuth',
    ['path' => '/RoleAuth'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
