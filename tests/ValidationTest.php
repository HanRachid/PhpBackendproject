<?php

use Framework\Validation\Manager;
use Framework\Validation\Rule\EmailRule;
use Framework\Validation\Rule\MinRule;
use Framework\Validation\Rule\RequiredRule;

beforeEach(function () {
    $this->manager = new Manager();
    $this->manager->addRule('required', new RequiredRule());
});


it('can validate email', function () {
    $this->manager->addRule('email', new EmailRule());

    $dataValidate=['email'=>'lalao@lbaba'];
    $rulesValidate=['email' =>['0' => 'email']];

    $actual = $this->manager->validate($dataValidate, $rulesValidate);
    $expected = $dataValidate;


    expect($actual)->toBe($expected);
});



it('can validate minimum length rule', function () {
    $this->manager->addRule('min', new MinRule());
    $dataValidate=['textfield'=>'lalaoala'];
    $rulesValidate=['textfield' =>['0' => 'min:4']];

    $actual = $this->manager->validate($dataValidate, $rulesValidate);
    $expected = $dataValidate;


    expect($actual)->toBe($expected);
});


it('can validate all rules at once', function () {
    $this->manager->addRule('min', new MinRule());
    $this->manager->addRule('email', new EmailRule());
    $dataValidate=['name'=>'lalaoala', 'email'=>'tamere@tonpere.tasoeur', 'password' => 'unpasswordbienfatsarace'];
    $rulesValidate=[
        'name' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:4'],
        ];

    $actual = $this->manager->validate($dataValidate, $rulesValidate);
    $expected = $dataValidate;


    expect($actual)->toBe($expected);
});
