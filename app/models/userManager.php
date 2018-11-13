<?php

namespace App\models;

use \PDO;

class UserManager {

    public function addUser(User $user) {
        $q = Database::getPDO()->prepare('INSERT INTO users(pseudo, email, users.password) 
        VALUES(:pseudo, :email, :pass)');

        $q->bindValue(':pseudo', $user->getPseudo());
        $q->bindValue(':email', $user->getEmail());
        $q->bindValue(':pass', $user->getPassword());
    
        $q->execute();
    }

    public function getOneUser(User $user) {
        $q = Database::getPDO()->prepare('SELECT id, pseudo, email
        FROM users 
        WHERE id = :id');

        $q->bindValue(':id', $user->getId());

        $q->execute();

        $user = $q->fetch();

        return new User($user);
    }

    public function updateUser(User $user) { 
        $q = Database::getPDO()->prepare('UPDATE users 
        SET userId = :id, userPseudo = :pseudo, userEmail = :email 
        WHERE id = :id');

        $q->bindValue(':id', $user->userId(), PDO::PARAM_INT);
        $q->bindValue(':pseudo', $user->userAuthor());
        $q->bindValue(':email', $user->userEmail());
    
        $q->execute();    
    }

    public function deleteUser(User $user) {
        
        $q = Database::getPDO()->prepare('DELETE FROM users
        WHERE id = :id');

        $q->bindValue(':id', $user->getId());

        $q->execute();
    }

    public function getAllUsers(){

        $users = [];

        $q = Database::getPDO()->query('SELECT pseudo, email FROM users');

        while ($datas = $q-> fetch(PDO::FETCH_ASSOC)){
            $users[] = new user($datas);
        }

        return $users;
    }
    
    public function checkUserConnexion(User $user) {

        $q = Database::getPDO()->prepare('SELECT id, email, users.password FROM users 
        WHERE pseudo = :pseudo');

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