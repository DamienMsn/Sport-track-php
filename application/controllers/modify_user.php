<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/model/SqliteConnection.php');
require(__ROOT__.'/model/Utilisateur.php');
require(__ROOT__.'/model/UtilisateurDAO.php');

class ModifyUserController extends Controller{

    public function get($request){
        $this->render('modify_user_form',[]);
    }

    public function post($request){
        try{

            $dbc = SqliteConnection::getInstance()->getConnection();

            $query = "SELECT * FROM Utilisateur WHERE idUtilisateur = :unUser";
            $stmt = $dbc->prepare($query);
            $stmt->bindValue(':unUser', $_SESSION["id"], PDO::PARAM_INT);
            $stmt->execute();
    
            $result = $stmt->fetchAll(PDO::FETCH_CLASS, "Utilisateur");
            $user = $result[0];
           
            $user->setNom($request["nom"]);
            $user->setPrenom($request["prenom"]);
            $user->setDate_naissance($request["date_naissance"]);
            $user->setTaille($request["taille"]);
            $user->setPoids($request["poids"]);

            $_SESSION['nom'] = $user->getNom();
            $_SESSION['prenom'] = $user->getPrenom();
            $_SESSION['date_naissance'] = $user->getDate_naissance();
            $_SESSION['taille'] = $user->getTaille();
            $_SESSION['poids'] = $user->getPoids();
    
            $userDAO = UtilisateurDAO::getInstance();

            $userDAO->update($user);

            $this->render('connect_info',[]);
        } catch(PDOException $e){
            printf("Échec de la connexion : %s\n", $e->getMessage());
            exit();
        }
    }
}
?>