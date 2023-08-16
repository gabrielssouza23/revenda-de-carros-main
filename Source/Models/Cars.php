<?php

namespace Source\Models;

use Source\Core\Connect;

class Cars{
    private $id;
    private $model;
    private $brand;
    private $price;
    private $year;
    private $description;

    public function selectAllCars()
    {
        $query = "
            SELECT
                c.id,
                c.model,
                b.name AS brand,
                c.price,
                c.year,
                c.description
            FROM
                cars c
            JOIN
                brands b ON c.brands_id = b.id;
        ";
    
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }
    
    public function selectFirstCars(){
        $query = "SELECT c.*, b.name
        FROM cars c
        JOIN brands b ON c.brands_id = b.id
        WHERE c.id = 1;
        ";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetch();
    }
    public function selectSecondCars(){
        $query = "SELECT c.*, b.name
        FROM cars c
        JOIN brands b ON c.brands_id = b.id
        WHERE c.id = 2;
        ";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetch();
    }
    public function selectThirdCars(){
        $query = "SELECT c.*, b.name
        FROM cars c
        JOIN brands b ON c.brands_id = b.id
        WHERE c.id = 3;
        ";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetch();
    }
    public function selectByBrand (string $brandName){
        $query = "SELECT c.model, b.name, c.price, c.year, c.description from cars c 
        join brands b on b.id = c.brands_id 
        where b.name like('{$brandName}')";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();

    }
}