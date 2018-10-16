<?php

namespace App\models;

class User {

    private $id;
    private $pseudo;
    private $email;
    private $password;

    public function __construct(array $datas)
    {
      $this->hydrate($datas);
    }

    public function hydrate(array $datas) {
        foreach ($datas as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function getId() {
        return $this->id;
    }
    public function getPseudo() {
        return $this->pseudo;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = (int) $id;
    }
    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }
    public function setEmail($email) {
        if (filter_var($password , FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        }
    }
    public function setPassword($password) {
        $this->password = $password;
    }
}