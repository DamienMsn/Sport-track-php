<?php
    require_once('SqliteConnection.php');
    require_once('Activite.php');

    class ActiviteDAO {
        private static ActiviteDAO $dao;
    
        private function __construct() {}
    
        public static function getInstance(): ActiviteDAO {
            if(!isset(self::$dao)) {
                self::$dao= new ActiviteDAO();
            }
            return self::$dao;
        }
    
        public final function findAll(): Array{
            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "select * from Activite";
            $stmt = $dbc->query($query);
            $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Activite');
            return $results;
        }
    
        public final function insert(Activite $st): void{
            if($st instanceof Activite){
                try{
                    $dbc = SqliteConnection::getInstance()->getConnection();
                    
                    // prepare the SQL statement
                    $query = "insert into Activite(date, description, duree, distance_parcourue, cardio_freq_min, cardio_freq_max, cardio_freq_moy, unUtilisateur) values (:d,:desc,:du,:dist,:cmin,:cmax,:cmoy,:unU)";
                    $stmt = $dbc->prepare($query);
        
                    // bind the paramaters
                    $stmt->bindValue(':d',$st->getDate(),PDO::PARAM_STR);
                    $stmt->bindValue(':desc',$st->getDescription(),PDO::PARAM_STR);
                    $stmt->bindValue(':du',$st->getDuree(),PDO::PARAM_STR);
                    $stmt->bindValue(':dist',$st->getDistParcourue(),SQLITE3_FLOAT);
                    $stmt->bindValue(':cmin',$st->getFreqMin(),PDO::PARAM_INT);
                    $stmt->bindValue(':cmoy',$st->getFreqMoy(),PDO::PARAM_INT);
                    $stmt->bindValue(':cmax',$st->getFreqMax(),PDO::PARAM_INT);
                    $stmt->bindValue(':unU',$st->getUnUtilisateur(),PDO::PARAM_INT);

        
                    // execute the prepared statement
                    $stmt->execute();

                    $lastId = $dbc->lastInsertId();
                    $st->setIdAct(intval($lastId));

                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                
            }
        }
    
        public function delete(Activite $obj): void {
            if($obj instanceof Activite){
                try{
                    $dbc = SqliteConnection::getInstance()->getConnection();

                    // prepare the SQL statement
                    $query = "delete from Activite where idAct = :i";
                    $stmt = $dbc->prepare($query);

                    // bind the paramaters
                    $stmt->bindValue(':i',$obj->getIdAct(),PDO::PARAM_INT);

                    // execute the prepared statement
                    $stmt->execute();

                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                


            }

         }
    
        public function update(Activite $obj): void {
            if($obj instanceof Activite){
                try{
                    $dbc = SqliteConnection::getInstance()->getConnection();


                    $query= "update Activite set date=:d , description=:desc , duree=:du , distance_parcourue=:dist , cardio_freq_min=:cmin , cardio_freq_max=:cmax , cardio_freq_moy=:cmoy , unUtilisateur=:unU where idAct = :i";
                    $stmt = $dbc->prepare($query);

                    $stmt->bindValue(':i',$obj->getIdAct(),PDO::PARAM_INT);
                    $stmt->bindValue(':d',$obj->getDate(),PDO::PARAM_STR);
                    $stmt->bindValue(':desc',$obj->getDescription(),PDO::PARAM_STR);
                    $stmt->bindValue(':du',$obj->getDuree(),PDO::PARAM_STR);
                    $stmt->bindValue(':dist',$obj->getDistParcourue(),SQLITE3_FLOAT);
                    $stmt->bindValue(':cmin',$obj->getFreqMin(),PDO::PARAM_INT);
                    $stmt->bindValue(':cmoy',$obj->getFreqMoy(),PDO::PARAM_INT);
                    $stmt->bindValue(':cmax',$obj->getFreqMax(),PDO::PARAM_INT);
                    $stmt->bindValue(':unU',$obj->getUnUtilisateur(),PDO::PARAM_INT);

                    $stmt->execute();

                }catch (Exception $e) {
                    echo $e->getMessage();
                }
            }
        }
    }
?>