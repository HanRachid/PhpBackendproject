<?php

namespace App\Http\Controllers\RegisterArticles;

use Framework\Database\Database;
use Framework\Routing\Router;

class ShowRegisterArticleController
{
    protected Router $router;
    public function __construct(Router $router)
    {
        $this->router = $router;
    }
    public function handle()
    {
        return view('register', [
        'router' => $this->router,
        ]);
    }
}
