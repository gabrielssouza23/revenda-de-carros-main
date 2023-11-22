<?php

namespace Source\Models;

use Source\Core\Connect;
use PDO;
use PDOException;

class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $address; // Atributo novo
    private $photo;
    private $message;


    public function __construct (
        $name = null,
        $email = null,
        $password = null,
        Address $address = null, // Parametro novo
        $photo = null
    ){
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address; // Atribuição nova
        $this->photo = $photo;
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

    public function getPhoto(): ?string {
        return $this->photo;
    }
    public function setPhoto(string $photo): void {
        $this->photo = $photo;
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
        $query = "INSERT INTO users VALUES (:name,:email,:password, NULL, NULL)";
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
        $query = "SELECT * FROM users WHERE email LIKE :email";

        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() == 0) {
            $this->message = "Usuário não encontrado";
            return false;
        }
        $user = $stmt->fetch();

        if (!password_verify($password, $user->password)) {
            $this->message = "Senha incorreta!";
            return false;
        }

        $this->name = $user->name;
        $this->email = $user->email;
        $this->id = $user->id;
        $this->photo = $user->photo;
        return true;
    }

    public function findById (int $id) : User
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":id",$id);
        try {
            $stmt->execute();
            if($stmt->rowCount()){
                $user = $stmt->fetch();
                $this->id = $user->id;
                $this->name = $user->name;
                $this->email = $user->email;
                $this->photo = $user->photo;
                $this->password = $user->password;
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
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email",$email);
        try {
            $stmt->execute();
            if($stmt->rowCount()){
                $user = $stmt->fetch();
                $this->id = $user->id;
                $this->name = $user->name;
                $this->email = $user->email;
                $this->photo = $user->photo;
                return true;
            }
            $this->message = "Usuário não encontrado!";
            return false;
        } catch (PDOException $e) {
            $this->message = "Erro: {$e->getMessage()}";
            return false;
        }
    }

    

    public function selectAllUsers()
    {
        $query = "
            SELECT
                u.id,
                u.name,
                u.email,
                u.photo
            FROM
                users u;
        ";
    
        $stmt = Connect::getInstance()->query($query);
        return $stmt->fetchAll();
    }

    public function uploadPhoto(string $photo) : bool
    {
        $query = "UPDATE users SET photo = :photo WHERE id = :id";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":photo",$photo);
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();
        return true;
    }
}