<?php

namespace Source\App\Api;

use CoffeeCode\Uploader\Image;
use Exception;
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
                    "token" => $this->token

                ]
            ];

            $this->back($response,201);
        }
    
    }

    public function login (array $data) : void
    {
            if(!empty($this->token)){
                $response = [
                    "user" => [
                        "id" => $this->user->getId(),
                        "name" => $this->user->getName(),
                        "email" => $this->user->getEmail(),
                        "photo" => $this->user->getPhoto(),
                        "token" => $this->token,
                        "type" => "success"
                ]
                ];
                $this->back($response,200);
            }
           // else{$this->back(["type" => "error"],400);}

        

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

    /*

    public function listUsers (array $data) : void
    {
        // $users = (new User())->selectAllUsers();
        // $this->back($users,200);
        $users = (new User())->selectAllUsers();
        $this->back($users,200);
    //echo "Ol´s";
    }
    */

    public function updatePhoto(array $data): void
    {
        chdir("..");

        $image = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR);

        $user = new User();
        $user->findById($this->user->getId());

        if ($_FILES) {
            try {
                $name = md5(uniqid(rand(), true));
                $upload = $image->upload($_FILES['photo'], $name, 1000);
                var_dump($upload);
                $user->uploadPhoto($upload);
                $this->back(["photo" => $upload], 200);
            } catch (Exception $e) {
                $this->back(["error" => $e->getMessage()], 400);
            }
        }
    }
}