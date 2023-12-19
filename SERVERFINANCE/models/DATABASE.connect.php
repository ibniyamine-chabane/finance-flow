<?php 

abstract class DataBaseConnect {

   private static $pdo;
   
   private static function setDatabase() {
        self::$pdo = new PDO("mysql:host=localhost;dbname=finance-flow;charset=utf8;port=3307","root","");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING); //for the gestion of error 
   }

   protected function getDatabase() {
        if (self::$pdo === null) { // is there is no connction on db, create an instance to connct with setDatabase
            self::setDatabase();
        }
        return self::$pdo;
   }
}