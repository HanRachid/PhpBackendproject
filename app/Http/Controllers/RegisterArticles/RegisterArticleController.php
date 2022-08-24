<?php

namespace App\Http\Controllers\RegisterArticles;

use App\Repositories\UserRepository;
use Framework\Database\Database;
use Framework\Database\DB;
use Framework\Routing\Router;

class RegisterArticleController
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


        $db = DB::getInstance();

        if ((new UserRepository($db))->deleteUser($data['email'])) {
            return redirect($this->router->route('home'));
        } else {
            redirect($this->router->route('register-user'));
        }
        /* if ($dbpdo->query($sql)) {
            $dbpdo = null;

        }; */


        $_SESSION['registered'] = true;
    }
}
