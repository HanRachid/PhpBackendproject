<?php

use App\Http\Controllers\Products\ListProductsController;
use App\Http\Controllers\ShowHomePageController;
use App\Http\Controllers\Users\RegisterUserController;
use App\Http\Controllers\Users\ShowRegisterFormController;
use Framework\Routing\Router;

return function (Router $router) {
    $router->add(
        'GET',
        '/',
        [new ShowHomePageController($router), 'handle'],
    )->name('home');

    $router->add(
        'GET',
        '/products/{page?}',
        [new ListProductsController($router), 'handle'],
    )->name('list-products');

    $router->add(
        'GET',
        '/register',
        [new ShowRegisterFormController($router), 'handle'],
    )->name('show-register-form');
    $router->add(
        'POST',
        '/register',
        [new RegisterUserController($router), 'handle'],
    )->name('register-user');
};
