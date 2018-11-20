<?php

namespace App\models;
use \PDO;

abstract class Database {

    const DB_NAME = 'db760479842';
    const DB_USER = 'dbo760479842';
    const DB_PASS = 'w3kjMdR45b8Ba6i';
    const DB_HOST = 'db760479842.hosting-data.io';

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