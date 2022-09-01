<?php

namespace Framework\Validation\Rule;

use App\Repositories\ProductRepository;
use Framework\Database\DB;

class UniqueRule implements Rule
{
    public function validate(array $data, string $field, array $params)
    {
        $db = DB::getInstance();
        return (empty((new ProductRepository($db))->skuexists($data[$field])));
    }
    public function getMessage(array $data, string $field, array $params)
    {
        return "there is already a Product in database with sku {$field}";
    }
}
