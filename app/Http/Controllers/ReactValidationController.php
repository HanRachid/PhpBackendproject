<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Framework\Database\DB;

use function PHPUnit\Framework\isEmpty;

class ReactValidationController
{
    public function handle()
    {
        $Products = json_decode(file_get_contents('php://input'), true);

        $Products['productProps'] = validate(
            $Products['productProps'],
            $Products['productRules']
        );

        echo json_encode(true);
    }
}
