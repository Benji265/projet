<?php
require_once '../controllers/buildingsControllers.php';
?>

<table class="widthTable">
    <tbody>
        <?php
        foreach ($json_data['buildings'] as $value) {
        ?>
            <tr>
                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                <th><?= $value['name'] ?> (Niveaux ...) <br><br> <?= $value['description'] ?> <br><br> Prix de la construction : ........</th>
                <th><input type=submit size=5 maxlength=5 value="Construire"></th>
            </tr>
        <?php } ?>
    </tbody>
</table>