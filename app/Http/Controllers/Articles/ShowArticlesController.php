<?php

namespace App\Http\Controllers\Articles;

use Framework\Routing\Router;

class ShowArticlesController
{
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function handle()
    {
        return view('articles/articles', ['arrayTest'=>['1','2'],
    'test' => "salu tibo"]);
    }
}
