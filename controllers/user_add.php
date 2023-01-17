<?php
require(__ROOT__.'/controllers/Controller.php');
require(__ROOT__.'/model/UtilisateurDAO.php');
//require(__ROOT__.'/model/Utilisateur.php');

class AddUserController  extends Controller{

    public function get($request){
        $this->render('user_add_form',[]);
    }
    
    public function post($request){
        try{

            $uti = UtilisateurDAO::getInstance();
            $u = new Utilisateur();
            
            $u->init($request['nom'],$request['prenom'],$request['date_naissance'],$request['sexe'],$request['taille'],$request['poids'],$request['email'],$request['pass']);
            try{
                $uti-> insert($u);
                $this->render('user_add_valid',['prenom'=>$request['prenom'] ,'nom'=>$request['nom'], 'dateDeNaisssance'=>$request['date_naissance'], 'sexe'=>$request['sexe'], 'taille'=>$request['taille'], 'poids'=>$request['poids'], 'mail'=>$request['email'], 'motDePasse'=>$request['pass']]);
            } 
            catch (Exception $e){
                $this->render('error',"Erreur lors de l'ajout de l'utilisateur");
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
            
            
            
    
    
}

?>
