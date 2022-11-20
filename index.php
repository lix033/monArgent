<?php
require('config/insertMoney.php');
require('config/security.php');
$userId = $_GET['user_id'];
$sommeT = "";
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
            <!-- <div class="logo">
                <h2 class="titre">MonArgent</h2>
            </div> -->

            <!-- requete concernant le graph -->
            <?php
            // $bd = new PDO('mysql:host=localhost; dbname=graph', 'root', '');
            $recup = $data->prepare("SELECT * FROM tot_entr,tot_sort WHERE tot_entr.code_user=? AND tot_sort.code_user=?");
            $recup->execute(array($user, $user));
            $userData = $recup->fetch();

            $entree[] = $userData['totalsomme'];
            $sortie[] = $userData['total_dep'];
            ?>



            <div class="date"></div><br><br>

            <div class="sommeTot">
                <?php
                $recupUser = $data->prepare('SELECT totalsomme FROM tot_entr WHERE code_user=?');
                $recupUser->execute(array($userId));
                $somme = $recupUser->fetch();
                $sommeT = $somme['totalsomme'];

                if ($sommeT != 0) {
                ?>
                    <p>Total : <span id="montant"><?= $sommeT ?></span> FCFA</p>
                <?php
                } else {
                ?>
                    echo'<p>Total : <span id="montant">0</span> FCFA</p>';
                <?php
                }
                ?>


            </div>
           
            <div class="message">
                <?php
                if (isset($errorMsg)) {
                ?>
                    <div class="alert alert-danger"><?= $errorMsg ?></div>
                <?php
                }
                if (isset($successMsg)) {
                ?>
                    <div class="alert alert-success"><?= $successMsg ?></div>
                <?php
                }
                ?>
            </div>

            <div id="items">
            <div class="graph">
                <canvas id="myChart"></canvas>
            </div>
                <div class="formTems">
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
    </div>



    <script>
        const labels = ['entrées', 'sorties'];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgb(255, 99, 132)',
                data: <?php
                        // echo json_encode($sortie) ;
                        echo json_encode($entree);
                        ?>,
            }]
        };

        const config = {
            type: 'radar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
    </script>


    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>


</body>
<!-- <script src="includes/script/chart.min.js"></script> -->
<script src="includes/bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="includes/script/chartjs.js"></script> -->

</html>