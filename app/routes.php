<?php

use Framework\Routing\Router;

return function (Router $router) {
    $router->add('GET', '/add-product', fn () => 'c lé produit pog');

    $router->add(
        'GET',
        '/products/view/{product}',
        function () use ($router) {
            $parameters = $router->current()->parameters();

            return "product is {$parameters['product']}";
        },
    );
    $router->add(
        'GET',
        '/services/view/{service?}',
        function () use ($router) {
            $parameters = $router->current()->parameters();
            if (empty($parameters['service'])) {
                return 'all services';
            }
            return "service is {$parameters['service']}";
        },
    );

    $router->add(
        'GET',
        '/',
        fn () => view('home', ['number' => 42]),
    );
};
