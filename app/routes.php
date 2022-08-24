<?php

use App\Http\Controllers\Products\ListProductsController;
use App\Http\Controllers\RegisterArticles\RegisterArticleController;
use App\Http\Controllers\RegisterArticles\ShowRegisterArticleController;
use App\Http\Controllers\ShowHomePageController;
use Framework\Routing\Router;

return function (Router $router) {
    $router->add(
        'GET',
        '/',
        [new ShowHomePageController($router), 'handle'],
    )->name('home');

    $router->add(
        'GET',
        '/addarticles',
        [new ShowRegisterArticleController($router), 'handle'],
    )->name('show-add-article');
    $router->add(
        'POST',
        '/addarticles',
        [new RegisterArticleController($router), 'handle'],
    )->name('add-article');
};
