<?php

namespace Source\App\Api;


use Source\Models\Adm;

class Adms extends ApiAdm
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create(array $data): void
    {
        if (!empty($data)) {
            $adm = new Adm($data["name"], $data["email"], $data["password"]);
            if (!$adm->insert()) {
                $response = [
                    "error" => [
                        "code" => 400,
                        "type" => "invalid_data",
                    ]
                ];
                $this->back($response, 400);
                return;
            }

            $response = [
                "adm" => [
                    "id" => $adm->getId(),
                    "name" => $adm->getName(),
                    "email" => $adm->getEmail(),
                    "token" => $this->token,

                ]
            ];

            $this->back($response, 201);
        }
    }
    public function login(array $data): void
    {
        if (!empty($this->token)) {
            $response = [
                "adm" => [
                    "id" => $this->adm->getId(),
                    "name" => $this->adm->getName(),
                    "email" => $this->adm->getEmail(),
                    "token" => $this->token
                ]
            ];
            $this->back($response, 200);
        }
    }
}
