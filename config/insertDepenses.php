<?php
require('config/database.php');

$user = $_GET['user_id'];

if (isset($_POST['validate'])) {

    if (!empty($_POST['saisiezone'])) {

        //recuperation de la somme total disponible...
        $recupSommeDisponible = $data->query('SELECT totalsomme from tot_entr');
        $totale = $recupSommeDisponible->fetch();
        $totaleDisponible = $totale['totalsomme'];

        //recupération de la somme a ajouter...
        $montant = htmlspecialchars($_POST['saisiezone']);


        //mise a jour de la somme total (retrais de la somme dépensé);
        if ($montant > $totaleDisponible) {
            $errorMsg = "Cette dépense exceède la somme disponible...";
        } else {
            
            //recupere la dépense totale existante...
            $recupSomme = $data->query('SELECT total_dep from tot_sort');
            $tot = $recupSomme->fetch();
            $actuel = $tot['total_dep'];

            //ajouter la dépense a la base de données table(sorties)...
            $insertMontant = $data->prepare('INSERT INTO sorties(somme, code_user)Values(?,?)');
            $insertMontant->execute(array($montant, $user));

            //mise a jour de la sommme totale des dépenses
            $total = $actuel + $montant;

            //mise a jour de la table de somme total des dépenses par utilisateur...
            $updateSomme = $data->prepare('UPDATE tot_sort SET total_dep =? WHERE code_user=?');
            $updateSomme->execute(array($total, $user));

            //mise a jour de la somme total disponible dans leporte feuille...
            $resteSommeDisponible = $totaleDisponible - $montant;
            $updateSommeDispo = $data->prepare('UPDATE tot_entr SET totalsomme =? WHERE code_user=?');
            $updateSommeDispo->execute(array($resteSommeDisponible, $user));


            $successMsg = "Opération réussi";
        }

        // $successMsg = "Avec succès";
    } else {
        $errorMsg = "Veuillez saisir le montant à dépensé";
    }
}
