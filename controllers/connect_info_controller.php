<?php
require(__ROOT__.'/controllers/Controller.php');

class ConnectUserController extends Controller{

    public function get($request){
        $this->render('connect_info',[$_SESSION['email'],$_SESSION['mot_de_passe']]);
    }
}
?>
