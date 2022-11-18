<?php
require('config/database.php');

$defautlSommme = 0;
$defautldepense = 0;

if (isset($_POST['validate'])) {

    //verification des champs de saisie...
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pass']) && !empty($_POST['telephone'])) {

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $telephone = htmlspecialchars($_POST['telephone']);

        $insertUser = $data->prepare('INSERT INTO users(nom, prenom, pass, telephone)VALUES(?,?,?,?) ');
        $insertUser->execute(array($nom, $prenom, $password, $telephone));

        //recuperation de l'id du user pour l'integrez dans la table tot_entr...
        $recupUser = $data->prepare('SELECT id_user, nom FROM users WHERE prenom=?');
        $recupUser->execute(array($prenom));
        $usercode = $recupUser->fetch();
        $codeUser = $usercode['id_user'];

        //insertion de la somme par defaut et de l'id du user...
        $DefaultUserSomme = $data->prepare('INSERT INTO tot_entr(totalsomme, code_user)VALUES(?,?)');
        $DefaultUserSomme->execute(array($defautlSommme, $codeUser));

        //insertion de la dépenses par defaut et de l'id du user...
        $DefaultUserSomme = $data->prepare('INSERT INTO tot_sort(total_dep, code_user)VALUES(?,?)');
        $DefaultUserSomme->execute(array($defautldepense, $codeUser));

        //redirection vers la page de la connection...
        echo "<script>alert('Inscription reussi')</script>";
        echo '<script>window.location.href="login.php"</script>';
    } else {
        echo "<script>alert('remplir tout les champs')</script>";
    }
}
