<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Framework\Database\DB;

class DatabaseToReactController
{
    public function handle()
    {
        $db = DB::getInstance();
        $Products = (new ProductRepository($db))->listProduct();
        $pr=[];
        foreach ($Products as $Product) {
            $pr[] = $Product->toArray();
        };

        echo json_encode(array_values($pr));
    }
}
