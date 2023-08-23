<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");

$route->get("/registro","Web:register");
$route->get("/login","Web:login");

$route->group(null);

$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");
$route->get("/veiculos","Web:vehicles");
$route->get("/venda","Web:vehicleBuy");

$route->get("/add","Web:carCreate");
$route->get("/veiculos/{brandName}","Web:vehicles");

$route->group("/app");
$route->get("/", "App:home");
$route->group(null);

$route->group("/admin");
$route->get("/", "Adm:home");
$route->get("/carros", "Adm:carCreate");
$route->get("/usuarios", "Adm:userPanel");
$route->group(null);




$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();
