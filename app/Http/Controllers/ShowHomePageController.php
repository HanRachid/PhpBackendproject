<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Framework\Database\DB;

class ShowHomePageController
{
    public function handle()
    {
        $db = DB::getInstance();
        $users = (new UserRepository($db))->listUser();

        return view('home', ['users' => $users]);
    }
}
