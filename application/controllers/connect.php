<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/model/SqliteConnection.php');
require(__ROOT__.'/model/Utilisateur.php');

class ConnectUserController extends Controller{

    public function get($request){
        $this->render('connect_form',[]);
    }

    public function post($request){

        if(isset($_POST['inscrip'])){
            $this->render('user_add_form',[]);
        }else{

            $email = $request['email'].'';
            $mot_de_passe = $request['mot_de_passe'].'';

            try{
        
                $dbc = SqliteConnection::getInstance()->getConnection();
                $query = "select COUNT(*) from Utilisateur where email ='".$email."' and mdp = '".$mot_de_passe."';";
                $stmt = $dbc->prepare($query);
                $stmt->execute();
                $result = $stmt->fetch();

                
                if($result[0] == 1){

                    $_SESSION['email'] = $email;
                    $_SESSION['mot_de_passe'] = $mot_de_passe;
                    
                    $this->render('connect_info',['email'=>$email,'mot_de_passe'=>$mot_de_passe]);
                    

                    $query = "select idUtilisateur from Utilisateur where email ='".$email."' and mdp = '".$mot_de_passe."';";
                    $stmt = $dbc->prepare($query);
                    $stmt->execute();
                    $result = $stmt->fetch();
                    $_SESSION['id'] = $result[0];

                    $query = "SELECT * FROM Utilisateur WHERE idUtilisateur = :unUser";
                    $stmt = $dbc->prepare($query);
                    $stmt->bindValue(':unUser', $_SESSION["id"], PDO::PARAM_INT);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Utilisateur");

                    $_SESSION['nom'] = $result[0]->getNom();
                    $_SESSION['prenom'] = $result[0]->getPrenom();
                    $_SESSION['date_naissance'] = $result[0]->getDate_naissance();
                    $_SESSION['sexe'] = $result[0]->getSexe();
                    $_SESSION['taille'] = $result[0]->getTaille();
                    $_SESSION['poids'] = $result[0]->getPoids();
                    $_SESSION['email'] = $result[0]->getEmail();
                    $_SESSION['mdp'] = $result[0]->getMDP();

                }
                else{
                    throw new PDOException("Email ou mot de passe incorrect");
                }        
            } catch(PDOException $e){
                printf("Échec de la connexion : %s\n", $e->getMessage());
                exit();
            }
        }
    }
}
?>
