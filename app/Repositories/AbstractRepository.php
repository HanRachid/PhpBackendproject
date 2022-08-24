<?php

namespace App\Repositories;

use Framework\Database\DB;

abstract class AbstractRepository
{
    protected DB $db;

    /**
     * @param DB $db
     */
    public function __construct(DB $db)
    {
        $this->db = $db;
    }
}
