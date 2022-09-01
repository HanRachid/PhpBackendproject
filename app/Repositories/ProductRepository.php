<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryContract;

class ProductRepository extends AbstractRepository implements ProductRepositoryContract
{
    public function listProduct(): array
    {
        $sql = <<<SQL
SELECT name, sku, price, size, weight,height,width,length,isDVD,isFurniture,isBook
FROM product
SQL;
        $rows = $this->db
            ->run($sql)
            ->fetchAll();

        return array_map(fn (array $row) => $this->ProductFromRow($row), $rows);
    }

    public function addProduct($name, $sku, $price, $size, $weight, $height, $width, $length, $isDVD, $isFurniture, $isBook): int
    {
        $sql = <<<SQL
        SET @@sql_mode:= '';
INSERT INTO product (name, sku, price, size, weight, height,width,length,isDVD,isFurniture,isBook) 
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?);
        
SQL;

        $this->db
            ->run($sql, [
               $name,$sku,$price,$size,$weight,$height,$width,$length,$isDVD, $isFurniture, $isBook
            ]);

        return $this->db->lastInsertId();
    }
    public function skuexists($sku)
    {
        $sql = <<<SQL
SELECT * FROM product 
WHERE sku = ?
SQL;

        return($this->db
             ->run($sql, [
                 $sku
             ])->fetch());
    }
    public function deleteProduct($sku)
    {
        $sql = <<<SQL
DELETE FROM product 
WHERE sku = ?
SQL;

        return $this->db
            ->run($sql, [
                $sku
            ])->rowCount();
    }

    private function ProductFromRow(array $row): Product
    {
        return new Product(
            $row['name'],
            $row['sku'],
            $row['price'],
            $row['size'],
            $row['weight'],
            $row['height'],
            $row['width'],
            $row['length'],
            $row['isDVD'],
            $row['isFurniture'],
            $row['isBook']
        );
    }
}
