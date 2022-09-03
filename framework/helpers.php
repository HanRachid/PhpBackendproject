<?php

use Framework\Validation\Rule\EmailRule;
use Framework\Validation\Rule\MinRule;
use Framework\Validation\Rule\RequiredRule;

use Framework\Validation;
use Framework\Validation\Rule\UniqueRule;

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
            $manager->addRule('unique', new UniqueRule());
        }
        return $manager->validate($data, $rules);
    }
}
