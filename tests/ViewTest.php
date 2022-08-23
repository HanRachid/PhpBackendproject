<?php

use Framework\View\Engine\AdvancedEngine;
use Framework\View\Engine\BasicEngine;
use Framework\View\Engine\PhpEngine;
use Framework\View\Manager;

beforeEach(function () {
    $this->manager = new Manager();
    $this->manager->addEngine('advanced.php', new AdvancedEngine());
    $this->manager->addEngine('php', new PhpEngine());
    $this->manager->addPath(__DIR__.'/fixtures/views');
    $this->manager->addEngine('basic.php', new BasicEngine());

    $this->manager->addMacro('escape', fn ($value) => htmlspecialchars($value));
    $this->manager->addMacro('includes', fn (...$params) => print view(...$params));
});

it('can display home.basic.php through BasicEngine', function () {
    $template = 'home';
    $data = ['number' => 42];
    $actual = $this->manager->resolve($template, $data);


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
    expect((string) $actual)->toBe($expected);
});


it('throws exception', function () {
    $template = 'bome';
    $data = [];
    $this->manager->render($template, $data);
})->throws(Exception::class, 'Could not render \'bome\'');
