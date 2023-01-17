<?php
require_once "CalculDistanceImpl.php";
    $parcours = array(array('long' => -2.776605,'lat' => 47.644795),
                  array('long' => -2.778911,'lat' => 47.646870),
                  array('long' => -2.780220,'lat' => 47.646197),
                  array('long' => -2.781068,'lat' => 47.646992),
                  array('long' => -2.781744,'lat' => 47.647867),
                  array('long' => -2.780145,'lat' => 47.648510));
    $calcul = new CalculDistanceImpl();
    $dist = $calcul -> calculDistanceTrajet($parcours);
    echo 'Distance parcouru = '.$dist;
?>
