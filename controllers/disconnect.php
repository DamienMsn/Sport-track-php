<?php
require(__ROOT__.'/controllers/Controller.php');

/**
 * to disconnect the user
 */

class DisconnectUserController extends Controller{

    public function get($request){
        session_destroy();
        $this->render('connect_form',[]);
    }
}
?>