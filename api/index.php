<?php

ob_start();

require  __DIR__ . "/../vendor/autoload.php";

use CoffeeCode\Router\Router;

$route = new Router(url(),":");

$route->namespace("Source\App\Api");

$route->get("/user","Users:read");

$route->post("/user","Users:create");

$route->get("/user/adresses","Users:listAdresses");


//$route->post("/user/login","Users:login");

//$route->get("/user/test", "Users:testToken");
$route->get("/user/login","Users:login");
//$route->get("/user/adresses","Users:listAdresses");

$route->get("/faqs","Faqs:listFaqs");

$route->get("/cars","CarsListApi:carsListApi");

$route->post("/cars/photo","CarsListApi:updatePhoto");

$route->get("/user/list","UsersTemp:listUsers");

$route->post("/user/photo","Users:updatePhoto");

$route->get("/cars/brand/{brand_id}", "CarsListApi:listByBrand");

$route->get("/cars/brand/{brand_id}/{car_id}", "CarsListApi:listByBrandCar");

$route->get("/cars/brand/delete/{brand_id}/{car_id}", "CarsListApi:deleteCar");

$route->get("/cars/{car_id}","CarsListApi:getCars");


$route->get("/adm","Adms:read");

$route->post("/adm","Adms:create");

$route->get("/adm/login","Adms:login");



$route->dispatch();




/** ERROR REDIRECT */
if ($route->error()) {
    header('Content-Type: application/json; charset=UTF-8');
    http_response_code(404);

    echo json_encode([
        "errors" => [
            "type " => "endpoint_not_found",
            "message" => "Não foi possível processar a requisição"
        ]
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
}

ob_end_flush();