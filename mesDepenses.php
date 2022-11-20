<?php
require('config/insertDepenses.php');
require('config/reqDepenses.php');
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
            <br><br><br>
            <h2>Toutes mes dépenses</h2>
            <div class="date"></div><br>
            <div class="infoDep">
                <div class="depensesJour">
                    <p>aujourd'hui: <span class="montant"><?=$responseD?></span> CFA</p>
                </div>
                <div class="depensesMois">
                    <p>ce mois: <span class="montant"><?=$responseM?></span> CFA</p>
                </div>
                <div class="depensesAnnee mb-3">
                    <p>cette année <span class="montant">0</span> CFA</p>
                </div>
                <div class="depensesAnnee mb-3">
                    <p>Moyenne dépenses <span class="montant"><?=$responseAvg?></span> CFA</p>
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
                <div class="inserezDepenses">
                    <div id="items">
                        <p class="txt1"><strong>Saisir la dépense</strong></p>
                        <form method="post">
                            <div class="zoneSaisie">
                                <input type="text" class=" mb-2 saisiezone" name="saisiezone" placeholder="CFA" >
                                <button id="envoyer" name="validate" class="btn btn-danger">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="graphDep">

            </div>
        </div>
    </div>
</body>
<script src="includes/bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>

</html>