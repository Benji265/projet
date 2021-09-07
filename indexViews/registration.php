<?php
require_once '../controllers/registrationControllers.php';
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

    <div class="container-fluid container-registration">
        <div class="wrap-registration">
            <h1 class="text-center registration-title">Inscription</h1>
            <form action="registration.php" method="POST" novalidate>
                <div class="row d-flex flex-column align-items-center">
                    <div class="col-auto mb-3">
                        <label for="pseudo" class="form-label">Pseudo :</label>
                        <span class="errorMsg"><?= $errorMsg['pseudo'] != 1 ? $errorMsg['pseudo'] : '' ?></span>
                        <input type="text" class="input-registration" name="pseudo" id="pseudo" value="<?= htmlspecialchars($_POST['pseudo'] ?? '') ?>">
                    </div>
                    <div class="col-auto mb-3">
                        <label for="email" class="form-label">Email :</label>
                        <span class="errorMsg"><?= $errorMsg['email'] != 1 ? $errorMsg['email'] : '' ?></span>
                        <input type="text" class="input-registration" name="email" id="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    </div>
                    <div class="col-auto mb-3">
                        <label for="password" class="form-label">Mot de passe :</label>
                        <span class="errorMsg"><?= $errorMsg['password'] != 1 ? $errorMsg['password'] : '' ?></span>
                        <input type="password" class="input-registration" name="password" id="password">
                    </div>
                    <div class="col-auto mb-3">
                        <label for="confirmPassword" class="form-label">Confirmez mot de passe :</label>
                        <span class="errorMsg"><?= $errorMsg['confirmPassword'] != 1 ? $errorMsg['confirmPassword'] : '' ?></span>
                        <input type="password" class="input-registration" name="confirmPassword" id="confirmPassword">
                    </div>
                    <div class="col-auto mb-4 text-center">
                        <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                        <span class="errorMsg"><?= $errorMsg['captcha'] ?></span>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <input type="submit" class="btn btn-primary" value="Inscription" name="registration">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        if (<?= $createUser ?>) {
            Swal.fire({
                icon: 'success',
                title: 'Inscription validé'
            }).then(function() {
                window.location = 'connection.php';
            })
        }
    </script>
</body>

</html>