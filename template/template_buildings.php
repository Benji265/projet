<?php
require_once '../controllers/buildingsControllers.php';
?>

<?php if (empty($arrayBuilding)) { ?>

    <table class="widthTable">
        <tbody>
            <?php
            foreach ($json_data['buildings'] as $value) {
                if ($value['name'] == 'Mine de métal') { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php }
                if ($value['name'] == 'Mine de cristal') { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?>
                            <form action="buildings.php" method="POST">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php }
                if ($value['name'] == 'Synth&eacute;tiseur de deut&eacute;rium') { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?>
                            <form action="buildings.php" method="POST">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php }
                if ($value['name'] == 'Centrale &eacute;lectrique solaire') { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?>
                            <form action="buildings.php" method="POST">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php }
                if ($value['name'] == 'Usine de robots') { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?>
                            <form action="buildings.php" method="POST">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php }
                if ($value['name'] == 'Hangar de m&eacute;tal') { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?>
                            <form action="buildings.php" method="POST">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php }
                if ($value['name'] == 'Hangar de cristal') { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?>
                            <form action="buildings.php" method="POST">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php }
                if ($value['name'] == 'R&eacute;servoir de deut&eacute;rium') { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?>
                            <form action="buildings.php" method="POST">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php }
                if ($value['name'] == 'Laboratoire de recherche') { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?>
                            <form action="buildings.php" method="POST">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

<?php } else { ?>

    <table class="widthTable">
        <tbody>
            <?php
            foreach ($json_data['buildings'] as $value) {
                foreach ($arrayBuilding as $buildings) {
                    if ($value['name'] == 'Mine de métal') { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <?php if ($value['name'] == $buildings['name']) { ?>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } ?>
                        </tr>
                    <?php }
                    if ($value['name'] == 'Mine de cristal') { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <?php if ($value['name'] == $buildings['name']) { ?>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } ?>
                        </tr>
                    <?php }
                    if ($value['name'] == 'Synth&eacute;tiseur de deut&eacute;rium') { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <?php if ($value['name'] == $buildings['name']) { ?>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } ?>
                        </tr>
                    <?php }
                    if ($value['name'] == 'Centrale &eacute;lectrique solaire') { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <?php if ($value['name'] == $buildings['name']) { ?>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } ?>
                        </tr>
                    <?php }
                    if ($value['name'] == 'Usine de robots') { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <?php if ($value['name'] == $buildings['name']) { ?>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } ?>
                        </tr>
                        <?php }
                    if ($value['name'] == 'Usine de nanites') {
                        foreach ($arrayResearch as $research) {
                            if ($buildings['name'] == 'Usine de robots' && $buildings['level'] >= 10) {
                                if ($research['name'] == 'Technologie Ordinateur' && $research['level'] >= 10) { ?>
                                    <tr>
                                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                        <?php if ($value['name'] == $buildings['name']) { ?>
                                            <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                                <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                            <form action="buildings.php" method="POST">
                                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                            </form>
                                        <?php } else { ?>
                                            <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                            <form action="buildings.php" method="POST">
                                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                            </form>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <?php }
                    if ($value['name'] == 'Chantier spatial') {
                        if ($buildings['name'] == 'Usine de robots' && $buildings['level'] >= 2) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <?php if ($value['name'] == $buildings['name']) { ?>
                                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                    <form action="buildings.php" method="POST">
                                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                    </form>
                                <?php } else { ?>
                                    <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                    <form action="buildings.php" method="POST">
                                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                    </form>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    <?php }
                    if ($value['name'] == 'Hangar de m&eacute;tal') { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <?php if ($value['name'] == $buildings['name']) { ?>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } ?>
                        </tr>
                    <?php }
                    if ($value['name'] == 'Hangar de cristal') { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <?php if ($value['name'] == $buildings['name']) { ?>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } ?>
                        </tr>
                    <?php }
                    if ($value['name'] == 'R&eacute;servoir de deut&eacute;rium') { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <?php if ($value['name'] == $buildings['name']) { ?>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } ?>
                        </tr>
                    <?php }
                    if ($value['name'] == 'Laboratoire de recherche') { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <?php if ($value['name'] == $buildings['name']) { ?>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> </th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

<?php } ?>