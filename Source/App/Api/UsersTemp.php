<?php

namespace Source\App\Api;

use Source\Models\User;

class UsersTemp extends Api
{
    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
    }

    public function listUsers (array $data) : void
    {
        // $users = (new User())->selectAllUsers();
        // $this->back($users,200);
        $users = (new User())->selectAllUsers();
        $this->back($users,200);
    //echo "Ol´s";
    }

}