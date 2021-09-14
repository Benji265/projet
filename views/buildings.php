<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/left_menu.css">
    <link rel="stylesheet" href="../assets/css/ressource_top.css">
    <link rel="stylesheet" href="../assets/css/styleMobile.css">
    <title>Overview</title>
</head>

<body class="style">
    <?php if ($_SESSION['sessionStart'] == 'Oui') { ?>
        <div class="row">
            <div class="offset-lg-4 col-lg-7 col-12">
                <?php
                require_once '../template/ressource_top.php';
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 d-none d-lg-block">
                <?php
                require_once '../template/left_menu.php';
                ?>
            </div>
            <div class="col-lg-8 col-12">
                <?php
                require_once '../template/template_buildings.php';
                ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="row justify-content-center errorStyle">
            <?php
            require_once '../template/error.php';
            ?>
        </div>
    <?php } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function compte_a_rebours() {
            var compte_a_rebours = document.getElementById("compte_a_rebours");

            var date_actuelle = new Date();
            var date_evenement = <?= $temp * 1000 ?>;
            var total_secondes = (date_evenement - date_actuelle) / 1000;

            if (total_secondes > 0) {
                var jours = Math.floor(total_secondes / (60 * 60 * 24));
                var heures = Math.floor((total_secondes - (jours * 60 * 60 * 24)) / (60 * 60));
                var minutes = Math.floor((total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60))) / 60);
                var secondes = Math.floor(total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60)));

                var mot_jour = "jours,";
                var mot_heure = "heures,";
                var mot_minute = "minutes";
                var mot_seconde = "secondes";

                if (jours == 0) {
                    jours = '';
                    mot_jour = '';
                } else if (jours == 1) {
                    mot_jour = "jour,";
                }

                if (heures == 0) {
                    heures = '';
                    mot_heure = '';
                } else if (heures == 1) {
                    mot_heure = "heure,";
                }

                if (minutes == 0) {
                    minutes = '';
                    mot_minute = '';
                } else if (minutes == 1) {
                    mot_minute = "minute,";
                }

                if (secondes == 0) {
                    secondes = '';
                    mot_seconde = '';
                } else if (secondes == 1) {
                    mot_seconde = "seconde";
                }

                compte_a_rebours.innerHTML = jours + ' ' + mot_jour + ' ' + heures + ' ' + mot_heure + ' ' + minutes + ' ' + mot_minute + ' ' + secondes + ' ' + mot_seconde;
            }

            var actualisation = setTimeout("compte_a_rebours();", 1000);
        }

        compte_a_rebours();
    </script>
</body>

</html>