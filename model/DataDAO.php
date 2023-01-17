<?php
    require_once('SqliteConnection.php');
    require_once('Data.php');

    class DataDAO {
        private static DataDAO $dao;
    
        private function __construct() {}
    
        public static function getInstance(): DataDAO {
            if(!isset(self::$dao)) {
                self::$dao= new DataDAO();
            }
            return self::$dao;
        }
    
        public final function findAll(): Array{
            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "select * from Data";
            $stmt = $dbc->query($query);
            $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Data');
            return $results;
        }
    
        public final function insert(Data $st): void{
            if($st instanceof Data){
                try{
                    $dbc = SqliteConnection::getInstance()->getConnection();
                    
                    // prepare the SQL statement
                    $query = "insert into Data(temps, cardio_frequence, latitude, longitude, altitude, unAct) values (:t,:c,:la,:lo,:al,:unA)";
                    $stmt = $dbc->prepare($query);
        
                    // bind the paramaters
                    $stmt->bindValue(':t',$st->getTemps(),PDO::PARAM_STR);
                    $stmt->bindValue(':c',$st->getCard(),PDO::PARAM_INT);
                    $stmt->bindValue(':la',$st->getLatitude(),SQLITE3_FLOAT);
                    $stmt->bindValue(':lo',$st->getLongitude(),SQLITE3_FLOAT);
                    $stmt->bindValue(':al',$st->getAltitude(),SQLITE3_FLOAT);
                    $stmt->bindValue(':unA',$st->getUneAct(),PDO::PARAM_INT);
        
                    // execute the prepared statement
                    $stmt->execute();

                    $lastId = $dbc->lastInsertId();
                    $st->setId(intval($lastId));

                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                
            }
        }
    
        public function delete(Data $obj): void {
            if($obj instanceof Data){
                try{
                    $dbc = SqliteConnection::getInstance()->getConnection();

                    // prepare the SQL statement
                    $query = "delete from Data where idData = :i";
                    $stmt = $dbc->prepare($query);

                    // bind the paramaters
                    $stmt->bindValue(':i',$obj->getId(),PDO::PARAM_INT);

                    // execute the prepared statement
                    $stmt->execute();

                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                


            }

         }
    
        public function update(Data $obj): void {
            if($obj instanceof Data){
                try{
                    $dbc = SqliteConnection::getInstance()->getConnection();


                    $query= "update Data set temps=:t , cardio_frequence=:c , latitude=:la , longitude=:lo , altitude=:al , uneAct=:unA where idData = :i";
                    $stmt = $dbc->prepare($query);

                    $stmt->bindValue(':i',$obj->getId(),PDO::PARAM_INT);
                    $stmt->bindValue(':t',$obj->getTemps(),PDO::PARAM_STR);
                    $stmt->bindValue(':c',$obj->getCard(),PDO::PARAM_INT);
                    $stmt->bindValue(':la',$obj->getLatitude(),SQLITE3_FLOAT);
                    $stmt->bindValue(':lo',$obj->getLongitude(),SQLITE3_FLOAT);
                    $stmt->bindValue(':al',$obj->getAltitude(),SQLITE3_FLOAT);
                    $stmt->bindValue(':unA',$obj->getUneAct(),PDO::PARAM_INT);

                    $stmt->execute();

                }catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
?>