<?php

use App\Http\Controllers\Products\ListProductsController;
use App\Http\Controllers\ShowHomePageController;
use Framework\Routing\Router;
use Framework\View\Engine\AdvancedEngine;

it('can use homepagecontroller', function () {
    $router = new Router();
    $router->add(
        'GET',
        '/',
        [new ShowHomePageController($router), 'handle'],
    );
    $actual = (string) $router->dispatch();
    $expected = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<title>Whoosh!</title>
<link
rel="stylesheet"
href="css/style.css"
/>
<meta charset="utf-8" />
</head>
<body>
<div class="container mx-auto font-sans">
<h1 class="text-xl font-semibold">Welcome to Whoosh!</h1>
<p>Here, you can buy 42 rockets.</p>
</div>
</body>
</html>
HTML;
    expect($actual)->toBe($expected);
});



it('can list products', function () {
    $router = new Router();
    $_SERVER['REQUEST_URI']='/products/2';
    $router->add(
        'GET',
        '/products/{page?}',
        [new ListProductsController($router), 'handle'],
    )->name('list-products');
    $actual = (string) $router->dispatch();


    $expected = <<<HTML
<!doctype html>
<html lang="en">
<head>
<title>Whoosh! Products</title>
<link
rel="stylesheet"
href="/css/style.css"
/>
<meta charset="utf-8" />
</head>
<body>
<div class="container mx-auto font-sans">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>

<h1 class="text-xl font-semibold">All Products</h1>
<p>Show all products...</p>
<a href="/products/3">next</a>
 
</body>
</html>
</div>
</body>
</html>
HTML;
    expect($actual)->toBe($expected);
});
