<?php

namespace Source\Models;

use Source\Core\Connect;
use Source\themes\adm\carCreate;

class Brands
{

    public function selectAll()
    {
        $query = "SELECT * FROM brands";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

}