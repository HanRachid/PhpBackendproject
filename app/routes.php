<?php

use Framework\Routing\Router;

return function (Router $router) {
    $router->add('GET', '/', fn () =>'hello world');

    $router->add('GET', '/add-product', fn () => 'c lé produit pog');

    $router->add(
        'GET',
        '/products/view/{product}',
        function () {
            return "product is ['product']}";
        },
    );
};
