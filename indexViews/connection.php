<?php
require_once '../controllers/connectionControllers.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/styleMobile.css">
    <title>Accueil</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-lg-none" href="#" data-nav="accueil">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav navLink">
                    <li class="nav-item d-none d-lg-block d-xxl-none">
                        <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="screenShots.php">ScreenShots</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="connection.php">Inscription/Connexion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid container-connection">
        <div class="wrap-connection">
            <h1 class="text-center connection-title">Connexion</h1>
            <form action="connection.php" method="POST">
                <div class="row d-flex flex-column">
                    <div class="col-auto mb-3">
                        <label for="login" class="form-label">Pseudo :</label>
                        <input type="text" class="input" name="login" id="login">
                    </div>
                    <div class="col-auto">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <input type="password" class="input" name="password" id="password">
                    </div>
                </div>
                <div class="row justify-content-center mt-4 mb-3">
                    <div class="col-auto">
                        <input type="submit" class="btn btn-primary" value="Connexion" name="connection">
                    </div>
                </div>
                <div class="row justify-content-center text-center">
                    <div class="col-auto">
                        <p class="text1"><a href="recoveryPassword.php">Mot de passe oublié ?</a></p>
                        <p class="text1"><a href="registration.php">Créer un nouveaux compte</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>