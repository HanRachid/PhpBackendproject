<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Framework\Database\DB;

class ReactToDatabaseController
{
    public function handle()
    {
        $db = DB::getInstance();
        $Products = (new ProductRepository($db));


        $data = json_decode(file_get_contents('php://input'), true);

        unset($data['validation']);
        $data = array_values($data);

        $Products->addProduct(...$data);
        echo json_encode($data);
    }
}
