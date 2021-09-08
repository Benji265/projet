<?php
require_once '../controllers/buildingsControllers.php';
?>

<table class="widthTable">
    <tbody>
        <?php
        foreach ($json_data['buildings'] as $value) {
            foreach ($arrayBuilding as $buildings) {
                if ($value['name'] == $buildings['name']) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br> <?= $value['description'] ?> <br><br><?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                        <form action="buildings.php" method="POST">
                            <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br> <?= $value['description'] ?> <br><br> Prix de la construction : ........</th>
                        <form action="building.php" method="POST">
                            <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>