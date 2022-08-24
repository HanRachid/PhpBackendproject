<?php

namespace App\Models;

class User
{
    protected $name;

    protected $email;

    protected $password;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    public function toArray()
    {
        return get_object_vars($this);
    }
}
