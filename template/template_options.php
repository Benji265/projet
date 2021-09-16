<?php
require_once '../controllers/optionsControllers.php';
?>
<?php if ($errorMsg['pseudo'] != 1 || $errorMsg['email'] != 1) { ?>
    <form action="options.php" method="POST">
        <table class="widthTable">
            <tbody>
                <tr>
                    <th colspan="4" class="titleMenu">Option</th>
                </tr>
                <tr>
                    <th colspan="2">Pseudo : <span class="errorMsg"><?= $errorMsg['pseudo'] == 1 ? '' : $errorMsg['pseudo'] ?></span></th>
                    <th colspan="2"><input type="text" name="pseudo" value="<?= $_POST['pseudo'] ?? $arrayUser['pseudo'] ?>"></th>
                </tr>
                <tr>
                    <th colspan="2">Email : <span class="errorMsg"><?= $errorMsg['email'] == 1 ? '' : $errorMsg['email'] ?></span></th>
                    <th colspan="2"><input type="mail" name="email" value="<?= $_POST['email'] ?? $arrayUser['email'] ?>"></th>
                </tr>
                <tr>
                    <th colspan="2">Nom de la planete :</th>
                    <th colspan="2"><input type="text" name="planets" value="<?= $_POST['planets'] ?? $arrayUser['name'] ?>"></th>
                </tr>
                <tr>
                    <th colspan="2"><span class="red">Supprimer le compte :</span></th>
                    <th colspan="2"><input type="checkbox" name="delete"></th>
                </tr>
                <tr>
                    <th colspan="4"><input type="submit" name="modifyUser" value="Valider"></th>
                </tr>
            </tbody>
        </table>
    </form>
<?php } elseif ($errorMsg['pseudo'] == 1 && $errorMsg['email'] == 1) { ?>
    <form action="options.php" method="POST">
        <table class="widthTable">
            <tbody>
                <tr>
                    <th colspan="4" class="titleMenu">Valider</th>
                </tr>
                <tr>
                    <th class="colspan2">Mot de passe : <span><?= $errorMsg['pseudo'] == 1 ? '' : $errorMsg['pseudo'] ?></span></th>
                    <th class="colspan2"><input type="password" name="password"></th>
                </tr>
                <tr>
                    <th class="colspan2">Confirmation de mot de passe :</th>
                    <th class="colspan2"><input type="password" name="confirmPassword"></th>
                </tr>
                <tr>
                    <th colspan="4"><input type="submit" name="validModify" value="Valider"></th>
                </tr>
            </tbody>
        </table>
    </form>
<?php } ?>