<?php

namespace App\models;

use App\App;

class UserManager {

    private $_id, $_pseudo, $_email;

    public function addUser(User $user) {
        $q = App::getDb()->prepare('INSERT INTO users(id, pseudo, email) VALUES(:id, :pseudo, :email)');

        $q->bindValue(':id', $user->userId(), PDO::PARAM_INT);
        $q->bindValue(':pseudo', $user->userAuthor());
        $q->bindValue(':email', $user->userEmail());
    
        $q->execute();
    }

    public function getOneUser($id) {
        $id = (int) $id;

        $q = App::getDb()->query('SELECT id, pseudo, mail FROM users WHERE id = '.$id);
        $datas = $q->fetch(PDO::FECTH_ASSOC);

        return new User($datas);
    }

    public function updateUser(User $user) { 
        $q = App::getDb()->prepare('UPDATE users SET userId = :id, userPseudo = :pseudo, userEmail = :email WHERE id = :id');

        $q->bindValue(':id', $user->userId(), PDO::PARAM_INT);
        $q->bindValue(':pseudo', $user->userAuthor());
        $q->bindValue(':email', $user->userEmail());
    
        $q->execute();    
    }

    public function deleteuser(User $user) {
        $q = App::getDb()->exec('DELETE FROM users WHERE id = '.$user->id());   
    }

    public function getAllUsers(){
        $users = [];
        $q = App::getDb()->query('SELECT id, pseudo, email FROM users');

        while ($datas = $q-> fetch(PDO::FETCH_ASSOC)){
            $users[] = new user($datas);
        }
    }

}