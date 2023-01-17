<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/model/SqliteConnection.php');
require (__ROOT__."/model/Activite.php");
require (__ROOT__."/model/ActiviteDAO.php");
require (__ROOT__."/model/Data.php");
require (__ROOT__."/model/DataDAO.php");
require (__ROOT__."/model/Utilisateur.php");
require (__ROOT__."/model/CalculDistanceImpl.php");

class UploadActivityController extends Controller{
    public function get($request){
        $this->render('upload_activity_form',[]);
    }

    public function post($request){
        
        try {
            $json_data = file_get_contents($_FILES['docpicker']['tmp_name']);
            $sport_data = json_decode($json_data, true);
        
            $activite = new Activite();
            $activite->init(date("Y-m-d",strtotime($sport_data["activity"]["date"])), $sport_data["activity"]["description"], '0', 0, 0, 200, 100, $_SESSION["id"]);
            
            $c = new CalculDistanceImpl; //c'est pas fini
            $d = $c->calculDistanceTrajet($sport_data["data"]);
            $activite->setDistParcourue(round($d, 3));
            
            $activiteDAO = ActiviteDAO::getInstance();
            $activiteDAO->insert($activite);

            $DataDAO = DataDAO::getInstance();

            foreach($sport_data["data"] as $data){
                $donnees = new Data();
                $donnees->init($data["time"], $data["latitude"], $data["longitude"], $data["altitude"], $data["cardio_frequency"], $activite->getIdAct());
                $DataDAO->insert($donnees);
            }

            $dbc = SqliteConnection::getInstance()->getConnection();
            
            $query = "select MIN(cardio_frequence) from Data , Activite where idAct = unAct and idAct = '".$activite->getIdAct()."' and unUtilisateur = '".$_SESSION["id"]."';";
            $stmt = $dbc->prepare($query);
            $stmt->execute();
            $min = $stmt->fetch();
            $activite->setFreqMin($min[0]);

            $query = "select MAX(cardio_frequence) from Data , Activite where idAct = unAct and idAct = '".$activite->getIdAct()."' and unUtilisateur = '".$_SESSION["id"]."';";
            $stmt = $dbc->prepare($query);
            $stmt->execute();
            $max = $stmt->fetch();
            $activite->setFreqMax($max[0]);

            $query = "select AVG(cardio_frequence) from Data , Activite where idAct = unAct and idAct = '".$activite->getIdAct()."' and unUtilisateur = '".$_SESSION["id"]."';";
            $stmt = $dbc->prepare($query);
            $stmt->execute();
            $moy = $stmt->fetch();
            $activite->setFreqMoy($moy[0]);

            $query = "SELECT (strftime('%s', (SELECT temps FROM Data WHERE idData = (SELECT MAX(idData) FROM Data WHERE unAct = '".$activite->getIdAct()."'))) - strftime('%s', (SELECT temps FROM Data WHERE idData = (SELECT MIN(idData) FROM Data WHERE unAct = '".$activite->getIdAct()."'))))";
            $stmt = $dbc->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch();
            $activite->setDuree(round($result[0]/60, 3));


            $activiteDAO->update($activite);
  

            $this->render('upload_activity_valid',[]);
        } catch (Exception $e) {
            $this->render('error',[$e->getMessage()]);
        }

    }
}
?>
