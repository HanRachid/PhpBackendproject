<?php


use Framework\View\Engine\BasicEngine;
use Framework\View\Manager;

beforeEach(function () {
    $this->manager = new Manager();
    $this->manager->addPath(__DIR__.'/fixtures/views');
    $this->manager->addEngine('basic.php', new BasicEngine());
});

it('can display home.basic.php through BasicEngine', function () {
    $template = 'home';
    $data = ['number' => 42];
    $actual = $this->manager->render($template, $data);


    $expected = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<title>Whoosh!</title>
<link
rel="stylesheet"
href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
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


it('throws exception', function () {
    $template = 'bome';
    $data = [];
    $this->manager->render($template, $data);
})->throws(Exception::class, 'Could not render \'bome\'');
