<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Brands;



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
        $brands = new Brands();
        echo $this->view->render("carCreate", [
            "brands" => $brands->selectAll()
        ]);
    }

    public function userPanel(array $data): void
    {
        echo $this->view->render("userPanel", []);
    }

    public function admLogin (): void
    {
        echo $this->view->render("admLogin",[]);
    }

    // public function brands ()
    // {
    //     $brands = new Brands();
    //     echo $this->view->render(
    //         "brands", [
    //             "brands" => $brands->selectAll()
    //         ]
    //     );
    // }
}
