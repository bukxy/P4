<?php

namespace App\models;

use \PDO;

class UserManager {

    public function addUser(User $user) {

        $q = Database::getPDO()->prepare('INSERT INTO users(user_pseudo, user_email, user_password) 
        VALUES(:pseudo, :email, :pass)');

        $q->bindValue(':pseudo', $user->getPseudo());
        $q->bindValue(':email', $user->getEmail());
        $q->bindValue(':pass', $user->getPassword());
    
        $q->execute();
    }

    public function getOneUser(User $user) {

        $q = Database::getPDO()->prepare('SELECT users.user_id, user_pseudo, user_email
        FROM users 
        WHERE user_id = :id');

        $q->bindValue(':id', $user->getId());

        $q->execute();

        $user = $q->fetch();

        if($user) {
            return new User($user);
        }
    }

    public function updateUser(User $user) { 
        
        $q = Database::getPDO()->prepare('UPDATE users 
        SET user_pseudo = :pseudo, user_email = :email, user_password = :pass
        WHERE users.user_id = :id');

        $q->bindValue(':pseudo', $user->getPseudo());
        $q->bindValue(':email', $user->getEmail());
        $q->bindValue(':pass', $user->getPassword());

        $q->bindValue(':id', $user->getId());
    
        $q->execute();    
    }

    public function deleteUser(User $user) {
        
        $q = Database::getPDO()->prepare('DELETE FROM users
        WHERE user_id = :id');

        $q->bindValue(':id', $user->getId());

        $q->execute();
    }

    public function getAllUsers(){

        $users = [];

        $q = Database::getPDO()->query('SELECT * FROM users ORDER BY user_id ASC');

        while ($datas = $q-> fetch()){
            $users[] = new User($datas);
        }

        return $users;
    }
    
    public function checkUserConnexion(User $user) {

        $q = Database::getPDO()->prepare('SELECT user_id, user_email, user_password FROM users 
        WHERE user_pseudo = :pseudo');

        $q->bindValue(':pseudo', $user->getPseudo());

        $q->execute();

        $user = $q->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return new User($user);
        } else {
            session_start();
            $_SESSION['notif'] = 'Ce pseudo est introuvable...';

            header('Location: index.php?p=connexion');
        }
    }
}