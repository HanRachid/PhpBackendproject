<?php

use Framework\Validation\Rule\EmailRule;
use Framework\Validation\Rule\MinRule;
use Framework\Validation\Rule\RequiredRule;
use Framework\View\Engine\AdvancedEngine;
use Framework\View\Engine\BasicEngine;
use Framework\View\Engine\PhpEngine;
use Framework\View\Manager;
use Framework\View\View;
use Framework\Validation;

if (!function_exists('view')) {
    function view(string $template, array $data = []): View
    {
        static $manager;
        if (!$manager) {
            $manager = new Manager();
            $manager->addPath(__DIR__.'/../resources/views');
            $manager->addEngine('basic.php', new BasicEngine());
            $manager->addEngine('advanced.php', new AdvancedEngine());
            $manager->addEngine('php', new PhpEngine());

            $manager->addMacro('escape', fn ($value) => htmlspecialchars($value));
            $manager->addMacro('includes', fn (...$params) => print view(...$params));
        }
        return $manager->resolve($template, $data);
    }
    if (!function_exists('redirect')) {
        function redirect(string $url)
        {
            header("Location: {$url}");

            exit;
        }
    }
    if (!function_exists('validate')) {
        function validate(array $data, array $rules)
        {
            static $manager;
            if (!$manager) {
                $manager = new Validation\Manager();
                $manager->addRule('required', new RequiredRule());
                $manager->addRule('email', new EmailRule());
                $manager->addRule('min', new MinRule());
            }
            return $manager->validate($data, $rules);
        }
    }
}
