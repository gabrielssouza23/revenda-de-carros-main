<?php

namespace Source\App;
use League\Plates\Engine;
use Source\Models\Faq;
use Source\Models\Cars;

class Web
{

    private $view;

    public function __construct(){
        $this->view = new Engine(__DIR__ . "/../../themes/web", "php");
        
    }
    public function home()
    {
        $faqs = new Faq();
        $cars = new Cars();
        //var_dump();
        //echo "Olá, Mundo! Home";
        echo $this->view->render("home",[
            "faqs" => $faqs->selectAll(),
            "faq1" => $faqs->selectFirst(),
            "faq2" => $faqs->selectSecond(),
            "faq3" => $faqs->selectThird(),
            "car1" => $cars->selectFirstCars(),
            "car2" => $cars->selectSecondCars(),
            "car3" => $cars->selectThirdCars(),
        ]);

    }

    public function about()
    {
        //echo "Olá, Mundo! Sobre";
        echo $this->view->render("about");

    }

    public function vehicles (array $data){
        $cars = new Cars();
        if(!empty($data["brandName"])){           
            echo $this->view->render("sell",[
                "cars" =>$cars->selectByBrand($data["brandName"]),
            ]);
            return;
        }
       
        echo $this->view->render("sell",[
            "cars" =>$cars->selectAllCars(),
        ]);
    }

    public function vehicleBuy (){
        echo $this->view->render("vehicleBuy");
    }
    public function faq ()
    {
        $faqs = new Faq();
        var_dump($faqs->selectAll());

        //echo $this->view->render("home",[
        //    "faqs" => $faqs->selectAll(),
        //]);
   
    }
    // public function faq
    // $faq = new Faq();
    
    // echo $this->view->render("home", [
    //     "faq" => $faq->selectFirst(),
    // ]);
}