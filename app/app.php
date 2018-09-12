<?php

namespace App;

class App {

    const DB_NAME = 'projet_4_blog';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';

    private static $database;
    private static $title = 'Projet 4';

    public static function getDb(){
        if( self::$database === null ) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$database;
    }

    public static function getTitle() {
        return self::$title;
    }

    public static function setTitle($titles) {
        self::$title = $title;
    }
}