<?php


use App\Http\Controllers\DatabaseToReactController;
use App\Http\Controllers\ReactToDatabaseController;
use App\Http\Controllers\ReactValidationController;
use App\Http\Controllers\RegisterArticles\RegisterArticleController;
use App\Http\Controllers\RemoveFromDatabaseController;
use App\Http\Controllers\ShowHomePageController;
use Framework\Routing\Router;

return function (Router $router) {
    $router->add(
        'POST',
        '/reactadd',
        [new ReactToDatabaseController($router), 'handle'],
    )->name('react-add');
    $router->add('GET', '/home', fn () =>'home page');

    $router->add(
        'POST',
        '/react',
        [new DatabaseToReactController($router), 'handle'],
    )->name('react');
    $router->add(
        'POST',
        '/reactvalidation',
        [new ReactValidationController($router), 'handle'],
    )->name('react-validation');
    $router->add(
        'POST',
        '/reactremove',
        [new RemoveFromDatabaseController($router), 'handle'],
    )->name('remove');
    $router->add(
        'GET',
        '/homepage',
        fn () => "hi",
    )->name('react');
};
