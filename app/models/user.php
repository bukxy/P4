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
        $id = (int) $id;

        if ($id >0) {
            $this->id = $id;
        }
    }
    public function setPseudo($pseudo) {
        if (is_string($pseudo)) {
            $this->pseudo = $pseudo;
        }
    }
    public function setEmail($email) {
        if (is_string($email)) {
            $this->email = $email;
        }
    }
    public function setPassword($password) {
        if (is_string($password)) {
            $this->password = $password;
        }
    }
}