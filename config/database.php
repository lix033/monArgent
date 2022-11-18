<?php
session_start();
// connection a la base de données 

try{
    $data = new PDO('mysql:host=localhost;dbname=mymoney','root','');
}catch(Exception $e){
    die('Erreur de connection a la base de données'.$e->getMessage());
}