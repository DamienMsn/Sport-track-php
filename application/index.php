<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
define ("__ROOT__",__DIR__);
session_start();

// Configuration
require_once (__ROOT__.'/config.php');

// ApplicationController
require_once (CONTROLLERS_DIR.'/ApplicationController.php');


// Add routes here
ApplicationController::getInstance()->addRoute('connect', CONTROLLERS_DIR.'/connect.php');
ApplicationController::getInstance()->addRoute('user_add', CONTROLLERS_DIR.'/user_add.php');
ApplicationController::getInstance()->addRoute('disconnect', CONTROLLERS_DIR.'/disconnect.php');
ApplicationController::getInstance()->addRoute('upload', CONTROLLERS_DIR.'/upload.php');
ApplicationController::getInstance()->addRoute('connect_info_controller', CONTROLLERS_DIR.'/connect_info_controller.php');
ApplicationController::getInstance()->addRoute('activities', CONTROLLERS_DIR.'/activities.php');
ApplicationController::getInstance()->addRoute('modify_user', CONTROLLERS_DIR.'/modify_user.php');


// Process the request
ApplicationController::getInstance()->process();
?>
