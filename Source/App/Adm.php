<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Cars;
use Source\Models\User;

class Adm
{
    private $view;

    public function __construct()
    {
        $this->view = new Engine(__DIR__ . "/../../themes/adm", "php");
    }

    public function home()
    {
        echo $this->view->render("home");
    }

    public function carCreate(array $data): void
    {
        $cars = new Cars();
        echo $this->view->render("carCreate", [
            "cars" => $cars->selectAllCars()
        ]);
    }

    public function userPanel(array $data): void
    {
        $usersPanel = new User();
        echo $this->view->render("userPanel", [
            "usersPanel" => $usersPanel->selectAllUsers()
        ]);
    }
}
