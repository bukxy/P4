<?php

namespace App\models;

class User {

    private $user_id;
    private $user_pseudo;
    private $user_email;
    private $user_password;

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
        return $this->user_id;
    }
    public function getPseudo() {
        return $this->user_pseudo;
    }
    public function getEmail() {
        return $this->user_email;
    }
    public function getPassword() {
        return $this->user_password;
    }

    public function setUser_id($id) {
        $id = (int) $id;

        if ($id >0) {
            $this->user_id = $id;
        }
    }
    public function setUser_pseudo($pseudo) {
        if (is_string($pseudo) && strlen($pseudo) <= 15) {
            $this->user_pseudo = $pseudo;
        }
    }
    public function setUser_email($email) {
        if (is_string($email)) {
            $this->user_email = $email;
        }
    }
    public function setUser_password($password) {
        if (is_string($password)) {
            $this->user_password = $password;
        }
    }
}