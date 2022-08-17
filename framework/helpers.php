<?php

use Framework\View\Engine\BasicEngine;
use Framework\View\Manager;

if (!function_exists('view')) {
    function view(string $template, array $data = []): string
    {
        static $manager;
        if (!$manager) {
            $manager = new Manager();
            $manager->addPath(__DIR__.'/../resources/views');
            $manager->addEngine('basic.php', new BasicEngine());
        }
        return $manager->render($template, $data);
    }
}
