<?php
Class SqliteConnection {


    private static $instance = null;
    private $pdo;
 

    private function __construct() {
        try{
            $this->pdo = new PDO('sqlite:'.dirname(__FILE__).'/sport_track.db');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(Exception $e) {
            echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
            die();
        }
    }
 
    /**
     * Méthode qui crée l'unique instance de la classe
     * si elle n'existe pas encore puis la retourne.
     * @param void
     * @return Singleton
     */
    public static function getInstance() {
        if(!isset(self::$instance)){
            self::$instance = new SqliteConnection();
        }

        return self::$instance;
    }

    public function getConnection(){
        return $this->pdo;
    }
}
?>