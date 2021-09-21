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
    <link rel="stylesheet" href="../assets/css/options.css">
    <link rel="stylesheet" href="../assets/css/sideBar.css">
    <title>Overview</title>
</head>

<body class="style reset vh-100">
    <?php if ($_SESSION['sessionStart'] == 'Oui') { ?>
        <?php
        require_once '../template/mobile_menu.php';
        ?>
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-auto d-none d-lg-block">
                <?php
                require_once '../template/left_menu.php';
                ?>
            </div>
            <div class="col-lg-auto col-auto w100">
                <?php
                require_once '../template/ressource_top.php';
                require_once '../template/template_options.php';
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../assets/js/sideBar.js"></script>
    <script>
        if (<?= $validOption ?>) {
            document.location.replace('options.php?validModify=no');
        }

        if (<?= $validModif ?>) {
            document.location.replace('options.php?validModify=yes');
        }

        if (<?= $validDelete ?>) {
            document.location.replace('options.php?validDelete=yes');
        }

        if (<?= $deleteAccount ?>) {
            Swal.fire({
                title: '<b>Compte Supprimer</b>',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location = '../index.php';
            })
        }
    </script>
</body>

</html>