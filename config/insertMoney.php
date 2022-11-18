<?php
require('config/database.php');

$user = $_GET['user_id'];

if (isset($_POST['validate'])) {

    if (!empty($_POST['saisiezone'])) {

        //recupération de la somme a ajouter...
        $montant = htmlspecialchars($_POST['saisiezone']);

        //recupere la somme existante...
        $recupSomme = $data->query('SELECT totalsomme from tot_entr');
        $tot = $recupSomme->fetch();
        $actuel = $tot['totalsomme'];
        

        //ajouter la somme a la base de données...
        $insertMontant = $data->prepare('INSERT INTO entree(somme, code_user)Values(?,?)');
        $insertMontant->execute(array($montant, $user));

        // //ajouter l'id du user dans total entrees...
        // $insertMontant = $data->prepare('INSERT INTO tot_entr(code_user)Values(?)');
        // $insertMontant->execute(array($user));

        //mise a jour de la sommme d'argent
        $total = $actuel + $montant;

        //mise a jour de la table de somme total par utilisateur...
        $updateSomme = $data->prepare('UPDATE tot_entr SET totalsomme =? WHERE code_user=?');
        $updateSomme->execute(array($total, $user));

        $successMsg = "Opération réussi";
    } else {
        $errorMsg = "Veuillez saisir le montant à integrer";
    }
}
