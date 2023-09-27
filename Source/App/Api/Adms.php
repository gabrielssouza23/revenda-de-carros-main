<?php

namespace Source\App\Api;


use Source\Models\Adm;

class Adms extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function read (array $data) : void
    {
        $response = [
            "code" => 200,
            "type" => "success",
            "message" => "Dados do usuário"
        ];
        http_response_code(200);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function create (array $data) : void
    {
    
    
       if(!empty($data)){
            $adm = new Adm($data["name"],$data["email"],$data["password"]);
            if(!$adm->insert()){
                $response = [
                    "error" => [
                        "code" => 400,
                        "type" => "invalid_data",
                        "message" => $adm->getMessage()
                    ]
                ];
                $this->back($response,400);
                return;
            }

            $response = [
                "adm" => [
                    "id" => $adm->getId(),
                    "name" => $adm->getName(),
                    "email" => $adm->getEmail(),
                ]
            ];

            $this->back($response,201);
        }
    
    }

    public function login (array $data) : void
    {
       
            if(!empty($this->token)){
                $response = [
                    "adm" => [
                        "id" => $this->adm->getId(),
                        "name" => $this->adm->getName(),
                        "email" => $this->adm->getEmail(),
                        "token" => $this->token
                ]
                ];
                $this->back($response,200);
            }

        

    }
   
    // public function listAdresses (array $data): void
    // {

    //     if($this->user){
    //         $adresses = new Address();
    //         $this->back($adresses->selectByIdUser($this->user->getId()),200);
    //     }

    // }
}