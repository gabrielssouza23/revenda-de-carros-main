<?php

namespace Source\Models;

use Source\Core\Connect;
use PDO;
use PDOException;

class Adm {
    private $id;
    private $name;
    private $email;
    private $password;
    private $message;

    public function __construct (
        $name = null,
        $email = null,
        $password = null
    ){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getPassword(): mixed
    {
        return $this->password; 
    }

    public function setPassword(mixed $password): void
    {
        $this->password = $password;
    }

    public function getMessage(): string
    {
        return $this->message;
    }


    public function insert () : bool
    {
        if($this->findByEmail($this->email)){
            $this->message = "E-mail já cadastrado!";
            return false;
        }
        $query = "INSERT INTO adms VALUES (NULL, :name,:email,:password)";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
                $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password",$this->password);
        try {
            $stmt->execute();
            if($stmt->rowCount()){
                $this->message = "Usuário inserido com sucesso!";
                return true;
            }
            $this->message = "Erro ao inserir usuário, verifique os dados!";
            return false;
        } catch (PDOException $e) {
            $this->message = "Erro: {$e->getMessage()}";
            return false;
        }
    }
    public function auth (string $email, string $password) : bool{
        $query = "SELECT * FROM adms WHERE email LIKE :email";

        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $this->message = "Usuário não encontrado";
            return false;
        }
        $adm = $stmt->fetch();

        if (!password_verify($password, $adm->password)) {
            $this->message = "Senha incorreta!";
            return false;
        }

        $this->name = $adm->name;
        $this->email = $adm->email;
        $this->id = $adm->id;
        $this->message = "Usuário autenticado com sucesso";
        return true;
    }

    public function findById (int $id) : Adm
    {
        $query = "SELECT * FROM adms WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id",$id);
        try {
            $stmt->execute();
            if($stmt->rowCount()){
                $adm = $stmt->fetch();
                $this->id = $adm->id;
                $this->name = $adm->name;
                $this->email = $adm->email;
                $this->password = $adm->password;
                return $this;
            }
            $this->message = "Usuário não encontrado!";
            return $this;
        } catch (PDOException $e) {
            $this->message = "Erro: {$e->getMessage()}";
            return $this;
        }
    }
    public function findByEmail (string $email) : bool
    {
        $query = "SELECT * FROM adms WHERE email = :email";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email",$email);
        try {
            $stmt->execute();
            if($stmt->rowCount()){
                $adm = $stmt->fetch();
                $this->id = $adm->id;
                $this->name = $adm->name;
                $this->email = $adm->email;
                return true;
            }
            $this->message = "Usuário não encontrado!";
            return false;
        } catch (PDOException $e) {
            $this->message = "Erro: {$e->getMessage()}";
            return false;
        }
    }

    

  
}