<?php

namespace App\models;

class User {

    private $_id;
    private $_pseudo;
    private $_email;

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
        return $this->_id;
    }
    public function getPseudo() {
        return $this->_pseudo;
    }
    public function getEmail() {
        return $this->_email;
    }

    public function setId($id) {
        $this->_id = (int) $id;
    }
    public function setPseudo($pseudo) {
        $this->_pseudo = $pseudo;
    }
    public function setEmail($email) {
        $this->_email = $email;
    }
}