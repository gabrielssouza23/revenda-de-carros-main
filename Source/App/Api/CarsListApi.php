<?php

namespace Source\App\Api;

use Source\Models\Cars;
use CoffeeCode\Uploader\Image;
use Exception;

class CarsListApi extends ApiAdm
{
    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
    }

    public function carsListApi (array $data) : void
    {
        $cars = (new Cars())->selectAllCars();
        $this->back($cars,200);
    }

    public function updatePhoto(array $data): void
    {
        chdir("..");

        $image = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR);

        $cars = new Cars();
        $cars->findById($this->$cars->getId());


        if ($_FILES) {
            try {
                $name = md5(uniqid(rand(), true));
                $upload = $image->upload($_FILES['photo'], $name, 1000);
                var_dump($upload);
                $cars->uploadPhoto($upload);
                $this->back(["photo" => $upload ], 200);
            } catch (Exception $e) {
                $this->back(["error" => $e->getMessage()], 400);
            }
        }
    }

    public function listByBrand (array $data) : void
    {
        $cars = (new Cars())->selectByCategoryId($data["brand_id"]);
        $this->back($cars,200);
    }

    public function listCars (array $data) : void
    {
        $cars = (new Cars())->selectAllCars();
        $this->back($cars,200);
    }

    public function getCars(array $data): void
    {
        $car = (new Cars())->selectById($data["brand_id"]);
        $this->back($car,200);
    }

    public function updateCourse(array $data): void
    {
        var_dump($data);

        //$this->back($data,200);
    }
}