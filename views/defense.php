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
                require_once '../template/template_defense.php';
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
</body>

</html>