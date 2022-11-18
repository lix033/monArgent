<?php 
require('config/database.php');

$defautlSommme = 100;

if(isset($_POST['validate'])){

    if(!empty($_POST['prenom']) && !empty($_POST['pass'])){

        $prenom = htmlspecialchars($_POST['prenom']);
        $password = htmlspecialchars($_POST['pass']); 

        $verifUser = $data->prepare('SELECT * FROM users WHERE prenom=?');
        $verifUser->execute(array($prenom));

        if($verifUser->rowcount() > 0){
            $userData = $verifUser->fetch();

            if(password_verify($password, $userData['pass'])){
                $_SESSION['auth']= true;
                $_SESSION['id'] = $userData['id_user'];
                $_SESSION['prenom']= $userData['prenom'];

                header("Location: index.php?user_id=".$_SESSION['id']."");
            }

        }else{
            echo'cet utilisateur existe pas';
        }

    }else{
        echo"veuillez remplir tous les champs";
    }
}