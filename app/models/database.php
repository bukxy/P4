<?php

namespace App\models;
use \PDO;

abstract class Database {

    const DB_NAME = 'projet_4_blog';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';

    private static $pdo;

    public static function getPDO() {
        if ( self::$pdo === null ) {
            $pdo = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME.';charset=utf8', self::DB_USER, self::DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            self::$pdo = $pdo;
        }
        return self::$pdo;
    }
}