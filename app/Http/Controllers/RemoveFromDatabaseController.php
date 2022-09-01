<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Framework\Database\DB;

class RemoveFromDatabaseController
{
    public function handle()
    {
        $db = DB::getInstance();
        $Database = (new ProductRepository($db));
        $toremove = json_decode(file_get_contents('php://input'), true);

        foreach ($toremove as $removable) {
            $Database->deleteProduct($removable);
        };
        echo json_encode($toremove) ;
    }
}
