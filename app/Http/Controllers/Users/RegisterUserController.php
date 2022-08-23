<?php

namespace App\Http\Controllers\Users;

use Framework\Database\Database;
use Framework\Routing\Router;
use PDOException;
use Throwable;

class RegisterUserController
{
    protected Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }


    public function handle()
    {
        $data = validate($_POST, [
        'name' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', 'min:4'],
        ]);




        $sql = "INSERT INTO user (name, email, password)
        VALUES ('".$data['name']."','".$data['email']."','".$data['password']."')";
        $user = 'root';
        $pw = 'root';
        $server = 'localhost';
        $dbpdo = new Database($user, $pw, $server);

        if ($dbpdo->query($sql)) {
            $dbpdo = null;
            return redirect($this->router->route('home'));
        };


        $_SESSION['registered'] = true;
    }
}
