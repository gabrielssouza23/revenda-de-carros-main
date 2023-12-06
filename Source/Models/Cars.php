<?php

namespace Source\Models;

use Source\Core\Connect;
use PDO;
use PDOException;

class Cars
{
    private $id;
    private $model;
    private $brand;
    private $price;
    private $year;
    private $photo;
    private $description;

    public function __construct(
        $model = null,
        $brand = null,
        $price = null,
        $year = null,
        $photo = null,
        $description = null
    ) {
        $this->model = $model;
        $this->brand = $brand;
        $this->price = $price;
        $this->year = $year;
        $this->photo = $photo;
        $this->description = $description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    // Setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function selectAllCars()
    {
        $query = "
            SELECT
                c.id,
                c.model,
                b.name AS brand,
                c.price,
                c.year,
                c.description,
                c.photo
            FROM
                cars c
            JOIN
                brands b ON c.brands_id = b.id;
        ";

        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function selectFirstCars()
    {
        $query = "SELECT c.*, b.name
        FROM cars c
        JOIN brands b ON c.brands_id = b.id
        WHERE c.id = 1;
        ";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetch();
    }

    public function selectSecondCars()
    {
        $query = "SELECT c.*, b.name
        FROM cars c
        JOIN brands b ON c.brands_id = b.id
        WHERE c.id = 2;
        ";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetch();
    }

    public function selectThirdCars()
    {
        $query = "SELECT c.*, b.name
        FROM cars c
        JOIN brands b ON c.brands_id = b.id
        WHERE c.id = 3;
        ";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetch();
    }


    public function selectByBrand(string $brandName)
    {
        $query = "SELECT
        c.id,
        c.model,
        b.name AS brand,
        c.price,
        c.year,
        c.description,
        c.photo
    FROM
        cars c
    JOIN
        brands b ON c.brands_id = b.id
    WHERE
        b.name LIKE '{$brandName}';
    ";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function selectById(int $id)
    {
        $query = "SELECT * FROM cars WHERE id = {$id}";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function selectByCategoryId(int $categoryId)
    {
        $query = "SELECT
        c.id,
        c.model,
        b.name AS brand,
        c.price,
        c.year,
        c.description
    FROM
        cars c
    JOIN
        brands b ON b.id = c.brands_id
    WHERE
        b.id = {$categoryId};
    ";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function selectByCategoryIdCar(int $carId)
    {
        $query = "SELECT
        c.id,
        c.model,
        b.name AS brand,
        c.price,
        c.year,
        c.description,
        c.photo
    FROM
        cars c
    JOIN
        brands b ON b.id = c.brands_id
    WHERE
        c.id = {$carId};
    ;
    ";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function deleteCar(int $carId)
    {
        $query = "DELETE FROM cars
        WHERE id = {$carId};        
    ;
    ";
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function uploadPhoto(string $photo): bool
    {
        $query = "UPDATE cars SET photo = :photo";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":photo", $photo);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return true;
    }


    public function findById(int $id): Cars
    {
        $query = "SELECT * FROM cars WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id", $id);
        try {
            $stmt->execute();
            if ($stmt->rowCount()) {
                $cars = $stmt->fetch();
                $this->id = $cars->id;
                $this->model = $cars->model;
                $this->brand = $cars->brand;
                $this->photo = $cars->photo;
                $this->price = $cars->price;
                $this->year = $cars->year;
                $this->description = $cars->description;
                return $this;
            }
            return $this;
        } catch (PDOException $e) {
            return $this;
        }
    }

    // public function update()
    // {
    //     $query = "UPDATE courses 
    //               SET name = :name,  category_id = :category_id, price = :price 
    //               WHERE id = :id";

    // }
}
