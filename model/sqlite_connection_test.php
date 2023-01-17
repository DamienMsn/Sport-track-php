<?php
require_once('SqliteConnection.php');
require_once('UtilisateurDAO.php');
require_once('ActiviteDAO.php');
require_once('DataDAO.php');

$dbc = SqliteConnection::getInstance()->getConnection();

echo("");
echo("");
echo("-----------------------Test Utilisateur----------------------------");
echo("");
echo("");

// create one user
$uti = UtilisateurDAO::getInstance();
$u = new Utilisateur();
$u->init('efflam','Mars','07/01/2003','M',170,56,'a@gmail.com','Efflam888');
$u2 = new Utilisateur();
$u2->init('Damien','Masson','25/09/2003','M',170,56,'damien@gmail.com','damienmasson');

// insert one user
$uti->insert($u);
$uti->insert($u2);

//show current user
$all = $uti-> findAll();
echo("-----------------------Avant update----------------------------");
echo("");
var_dump ($all);


// udapte the new user
$u2->setNom("Toto");
$uti->update($u2);

//show current user
$all = $uti->findAll();
echo("-----------------------Apres update----------------------------");
echo("");
var_dump ($all);


// delete this user
$uti->delete($u);
$uti->delete($u2);


echo("");
echo("");
echo("-----------------------Test Activite----------------------------");
echo("");
echo("");



// create one act
$actDOA = ActiviteDAO::getInstance();
$act = new Activite();
$act->init('23/09/2022','entrainement basket','2',10,90,100,95,$u->getId());
$act2 = new Activite();
$act2->init('23/09/2022','jogging matinal','1',2,90,100,95,$u2->getId());

// insert one user
$actDOA->insert($act);
$actDOA->insert($act2);

//show current user
$all = $actDOA-> findAll();
echo("-----------------------Avant update----------------------------");
echo("");
var_dump ($all);


// udapte the new user
$act2->setDescription("oui");
$actDOA->update($act2);

//show current user
$all = $actDOA-> findAll();
echo("-----------------------Apres update----------------------------");
echo("");
var_dump ($all);


// delete this user
$actDOA->delete($act);
$actDOA->delete($act2);





echo("");
echo("");
echo("-----------------------Test Data----------------------------");
echo("");
echo("");



// create one act
$dataDAO = DataDAO::getInstance();
$d = new Data();
$d->init('2min',0,0,0,$act->getIdAct(), 80);
$d2 = new Data();
$d2->init('1h',5,5,5,$act->getIdAct(), 90);

// insert one user
$dataDAO->insert($d);
$dataDAO->insert($d2);

//show current user
$all = $dataDAO-> findAll();
echo("-----------------------Avant update----------------------------");
echo("");
var_dump ($all);


// udapte the new user
$d2->setTemps("5h");
$dataDAO->update($d2);

//show current user
$all = $dataDAO-> findAll();
echo("-----------------------Apres update----------------------------");
echo("");
var_dump ($all);


// delete this user
$dataDAO->delete($d);
$dataDAO->delete($d2);
?>