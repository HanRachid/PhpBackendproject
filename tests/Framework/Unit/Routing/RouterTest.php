<?php

/*
test('example', function () {
    expect(true)->toBeTrue();
});
 */

use Framework\Routing\Router;

it('can match default route (root)', function () {
    $router = new Router();
    $router->add('GET', '/', fn () =>'caca');

    $actual = $router->dispatch();
    expect($actual)->toBe('caca');
});


it('can display /add-product', function () {
    $router = new Router();
    $router->add('GET', '/add-product', fn () => 'c lé produit pog');
    $_SERVER['REQUEST_URI']='/add-product';
    $actual = $router->dispatch();
    expect($actual)->toBe('c lé produit pog');
});


it('can display notFound handler', function () {
    $router = new Router();
    $router->add('GET', '/arandomuriunfoundable', fn () =>'peu importe');
    $_SERVER['REQUEST_URI']='/not_our_uri';
    $actual = $router->dispatch();
    expect($actual)->toBe('404 not found');
});

it('can display custom product site', function () {
    $router = new Router();
    $router->add(
        'GET',
        '/products/view/{product}',
        function () use ($router) {
            $parameters = $router->current()->parameters();

            return "product is {$parameters['product']}";
        },
    );

    $_SERVER['REQUEST_URI'] = '/products/view/test';

    $actual = $router->dispatch();
    expect($actual)->toBe('product is test');
});
