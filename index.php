<?php 
require('config/insertMoney.php');
require('config/security.php');
$userId =$_GET['user_id'] ;
$sommeT="";
?>
<!DOCTYPE html>
<html lang="en">

<?php include('includes/head.php') ?>

<body>
    <div class="container">
        <div class="row">
            <div class="bar">
            <?php include('includes/navbar.php') ?>
            </div>
            <div class="logo">
                <h2 class="titre">MonArgent</h2>
            </div> 
            <div class="date"></div><br><br>
            <div class="sommeTot">
            <?php
            $recupUser = $data->prepare('SELECT totalsomme FROM tot_entr WHERE code_user=?');
            $recupUser->execute(array($userId));
            $somme = $recupUser->fetch();
            $sommeT = $somme['totalsomme'] ;

            if($sommeT!=0){
                ?>
                <p>Total : <span id="montant"><?=$sommeT?></span> FCFA</p>
                <?php
            }else{
                ?>
                echo'<p>Total : <span id="montant">0</span> FCFA</p>';
                <?php
            }
            ?>

                
            </div>
            <div class="message">
                <?php 
                    if(isset($errorMsg)){
                        ?>
                            <div class="alert alert-danger"><?=$errorMsg?></div>
                            <?php
                    }
                    if(isset($successMsg)){
                        ?>
                            <div class="alert alert-success"><?=$successMsg?></div>
                            <?php
                    }
                ?>
            </div>
            <div id="items">
                <p class="txt1"><strong>Ajouter une somme</strong></p>
                <form method="post">
                <div class="zoneSaisie">
                    <input type="text" class=" mb-2 saisiezone" name="saisiezone" placeholder="CFA" autocomplete="off">
                    <button id="envoyer" name="validate" class="btn btn-success">Valider</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="includes/bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>
</html>