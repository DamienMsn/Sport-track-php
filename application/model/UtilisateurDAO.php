<?php
    require_once('SqliteConnection.php');
    require_once('Utilisateur.php');

    class UtilisateurDAO {
        private static UtilisateurDAO $dao;
    
        private function __construct() {}
    
        public static function getInstance(): UtilisateurDAO {
            if(!isset(self::$dao)) {
                self::$dao= new UtilisateurDAO();
            }
            return self::$dao;
        }
    
        public final function findAll(): Array{
            $dbc = SqliteConnection::getInstance()->getConnection();
            $query = "select * from Utilisateur";
            $stmt = $dbc->query($query);
            $results = $stmt->fetchALL(PDO::FETCH_CLASS, 'Utilisateur');
            return $results;
        }
    
        public final function insert(Utilisateur $st): void{
            if($st instanceof Utilisateur){
                try{
                    $dbc = SqliteConnection::getInstance()->getConnection();
                    
                    // prepare the SQL statement
                    $query = "insert into Utilisateur(nom, prenom, date_naissance, sexe, taille, poids, email, mdp) values (:n,:p,:d,:s,:t,:po,:m,:mp)";
                    $stmt = $dbc->prepare($query);
        
                    // bind the paramaters
                    $stmt->bindValue(':n',$st->getNom(),PDO::PARAM_STR);
                    $stmt->bindValue(':p',$st->getPrenom(),PDO::PARAM_STR);
                    $stmt->bindValue(':d',$st->getDate_naissance(),PDO::PARAM_STR);
                    $stmt->bindValue(':s',$st->getSexe(),PDO::PARAM_STR);
                    $stmt->bindValue(':t',$st->getTaille(),PDO::PARAM_INT);
                    $stmt->bindValue(':po',$st->getPoids(),PDO::PARAM_INT);
                    $stmt->bindValue(':m',$st->getEmail(),PDO::PARAM_STR);
                    $stmt->bindValue(':mp',$st->getMDP(),PDO::PARAM_STR);

        
                    // execute the prepared statement
                    $stmt->execute();

                    $lastId = $dbc->lastInsertId();
                    $st->setId(intval($lastId));

                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                
            }
        }
    
        public function delete(Utilisateur $obj): void {
            if($obj instanceof Utilisateur){
                try{
                    $dbc = SqliteConnection::getInstance()->getConnection();

                    // prepare the SQL statement
                    $query = "delete from Utilisateur where idUtilisateur = :i";
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
    
        public function update(Utilisateur $obj): void {
            if($obj instanceof Utilisateur){
                try{
                    $dbc = SqliteConnection::getInstance()->getConnection();

                    $query= "update Utilisateur set nom=:n , prenom=:p , date_naissance=:d, sexe=:s , taille=:t , poids=:po , email=:m ,  mdp=:mdp where idUtilisateur = :i";
                    $stmt = $dbc->prepare($query);

                    $stmt->bindValue(':i',$obj->getId(),PDO::PARAM_INT);
                    $stmt->bindValue(':n',$obj->getNom(),PDO::PARAM_STR);
                    $stmt->bindValue(':p',$obj->getPrenom(),PDO::PARAM_STR);
                    $stmt->bindValue(':d',$obj->getDate_naissance(),PDO::PARAM_STR);
                    $stmt->bindValue(':s',$obj->getSexe(),PDO::PARAM_STR);
                    $stmt->bindValue(':t',$obj->getTaille(),PDO::PARAM_INT);
                    $stmt->bindValue(':po',$obj->getPoids(),PDO::PARAM_INT);
                    $stmt->bindValue(':m',$obj->getEmail(),PDO::PARAM_STR);
                    $stmt->bindValue(':mdp',$obj->getMDP(),PDO::PARAM_STR);

                    $stmt->execute();

                }catch (Exception $e) {
                    echo $e->getMessage();
                }



            }
        }
    }
?>