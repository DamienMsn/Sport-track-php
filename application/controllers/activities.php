<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/model/SqliteConnection.php');
require (__ROOT__."/model/Activite.php");
require (__ROOT__."/model/Utilisateur.php");

class ListActivityController extends Controller{
 
    public function get($request){
        try {
            $activities = [];
            $nom = "";
            $prenom = "";

            try {
                $dbc = SqliteConnection::getInstance()->getConnection();

                $query = "SELECT * FROM Activite WHERE unUtilisateur = :unUser";
                $stmt = $dbc->prepare($query);
                $stmt->bindValue(':unUser', $_SESSION["id"], PDO::PARAM_INT);
                $stmt->execute();

                $activities = $stmt->fetchAll(PDO::FETCH_CLASS, "Activite");

                $query = "SELECT * FROM Utilisateur WHERE idUtilisateur = :unUser";
                $stmt = $dbc->prepare($query);
                $stmt->bindValue(':unUser', $_SESSION["id"], PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Utilisateur");

                $nom = $result[0]->getNom();
                $prenom = $result[0]->getPrenom();
                

            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            $this->render('activities_form',["activities"=>$activities , "nom"=>$nom , "prenom"=>$prenom]);
        } catch (Exception $e) {
            $this->render('error',[$e->getMessage()]);
        }

    }
}

?>