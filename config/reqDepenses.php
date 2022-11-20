<?php
// require('./database.php');
$user = $_GET['user_id'];
$dateT = date("Y-m-d");
$mois = date("m");
$annee = date("Y");
// $month = date("M");

// echo $mois;
// echo $month;


//requete pour afficher les dépenses du jour...
$todayDepenses = $data->prepare('SELECT SUM(somme) as totalDay FROM sorties WHERE code_user=? AND date_stamp=?');
$todayDepenses->execute(array($user, $dateT));
$resultD = $todayDepenses->fetch();
$responseD = $resultD['totalDay']; 

//requete pour afficher les dépenses du mois actuel
$monthDepenses = $data->prepare('SELECT SUM(somme) as totalMonth FROM sorties WHERE code_user=? AND MONTH(date_stamp)=?');
$monthDepenses->execute(array($user, $mois));
$resultM = $monthDepenses->fetch();
$responseM = $resultM['totalMonth']; 

//requete pour afficher la moyenne total des dépenses...
$avgDepenses = $data->prepare('SELECT AVG(somme) as moyenne FROM sorties WHERE code_user=? AND YEAR(date_stamp)=?');
$avgDepenses->execute(array($user, $annee));
$resultAvg = $avgDepenses->fetch();
$responseAvg = $resultAvg['moyenne']; 