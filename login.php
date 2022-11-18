<?php require('config/loginUser.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php') ?>
<body>
    <div class="container">
        <div class="row">
            <form method="post">
                <input type="text" name="prenom">
                <input type="password" name="pass">
                <button name="validate">Connecter</button>
                <a href="signUp.php">s'inscrire</a>
            </form>
        </div>
    </div>
</body>
</html>