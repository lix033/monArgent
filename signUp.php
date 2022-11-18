<?php require('config/signUpUser.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php') ?>
<body>
    <div class="container">
        <div class="row">
            <form method="post">
                <input type="text" name="nom" placeholder="nom">
                <input type="text" name="prenom" placeholder="prenom">
                <input type="password" name="pass" placeholder="mot de passe">
                <input type="tel" name="telephone" placeholder="telephone">
                <button name="validate">Inscription</button>
            </form>
        </div>
    </div>
</body>
</html>