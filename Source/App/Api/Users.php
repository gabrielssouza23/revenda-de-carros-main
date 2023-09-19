<?php

namespace Source\App\Api;

use Source\Models\Address;

use Source\Models\User;

class Users extends Api
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
    //    if(!empty($data)){
    //         $user = new User($data["name"],$data["email"],$data["password"]);
    //         if(!$user->insert()){
    //             $response["error"] = [
    //                 "code" => 400,
    //                 "type" => "invalid_data",
    //                 "message" => $user->getMessage()
    //             ];
    //             http_response_code(400);
    //             echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    //             return;
    //         }

    //         $response["success"] = [
    //             "code" => 200,
    //             "type" => "success",
    //             "message" => $user->getMessage(),
    //             "user" => [
    //                 "name" => $user->getName(),
    //                 "email" => $user->getEmail(),
    //             ]
    //         ];

    //         http_response_code(200);
    //         echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    //     
    
       if(!empty($data)){
            $user = new User($data["name"],$data["email"],$data["password"]);
            if(!$user->insert()){
                $response = [
                    "error" => [
                        "code" => 400,
                        "type" => "invalid_data",
                        "message" => $user->getMessage()
                    ]
                ];
                $this->back($response,400);
                return;
            }

            $response = [
                "user" => [
                    "id" => $user->getId(),
                    "name" => $user->getName(),
                    "email" => $user->getEmail(),
                ]
            ];

            $this->back($response,201);
        }
    
    }

    public function login (array $data) : void
    {
        /*
        $user = new User();
        if($user->auth($data["email"], $data["password"])){
            $response = [
                "code" => 200,
                "type" => "success",
                "message" => "Sucesso"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            return;
        }
        $response["error"] = [
                "code" => 500,
                "type" => "internal_server_error",
                "message" => "Login não encontrado!"
            ];
            echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            */
            if(!empty($this->token)){
                $response = [
                    "user" => [
                        "id" => $this->user->getId(),
                        "name" => $this->user->getName(),
                        "email" => $this->user->getEmail(),
                        "token" => $this->token
                ]
                ];
                $this->back($response,200);
            }

        

    }
    // public function testToken (array $data) : void{
    //     echo "ola";
    // }
    public function listAdresses (array $data): void
    {

        if($this->user){
            $adresses = new Address();
            $this->back($adresses->selectByIdUser($this->user->getId()),200);
        }

    }
}