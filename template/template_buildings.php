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
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
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
            <?php foreach ($arrayBuilding as $buildings) {
                if ($buildings['built'] == 0) {
                    $temp = $buildings['timestamp'] + $buildingsLevelTimeBuilt[$buildings['name']][$buildings['level']];
                    $temp_remaining = $temp - time();

                    $m_remaining = $temp_remaining / 60;
                    $h_remaining = $s_remaining / 60;
                    $j_remaining = $m_remaining / 24;

                    $s_remaining = floor($temp_remaining % 60);
                    $m_remaining = floor($m_remaining % 60);
                    $h_remaining = floor($h_remaining % 24);

                    if ($temp_remaining > 0) { ?>
                        <tr>
                            <th colspan="3">Liste de contruction</th>
                        </tr>
                        <tr>
                            <th colspan="2"><?= $buildings['name'] ?></th>
                            <th colspan="1"><?= $m_remaining . ' minute ' . $s_remaining . ' seconde' ?></th>
                        </tr>
                    <?php } else {
                        $buildingsObj->finishCreateBuilding($buildings['Building_id']);
                    } ?>
                    <?php }
            }
            foreach ($json_data['buildings'] as $value) {
                foreach ($arrayBuilding as $buildings) {
                    if ($value['name'] == 'Mine de métal') { ?>
                        <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0 ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } ?>
                    <?php }
                    if ($value['name'] == 'Mine de cristal') { ?>
                        <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } ?>
                    <?php }
                    if ($value['name'] == 'Synth&eacute;tiseur de deut&eacute;rium') { ?>
                        <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } ?>
                    <?php }
                    if ($value['name'] == 'Centrale &eacute;lectrique solaire') { ?>
                        <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } ?>
                    <?php }
                    if ($value['name'] == 'Usine de robots') { ?>
                        <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } ?>
                        <?php }
                    if ($value['name'] == 'Usine de nanites') {
                        foreach ($arrayResearch as $research) {
                            if ($buildings['name'] == 'Usine de robots' && $buildings['level'] >= 10) {
                                if ($research['name'] == 'Technologie Ordinateur' && $research['level'] >= 10) { ?>
                                    <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                                        <tr>
                                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                            <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                                <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                            <form action="buildings.php" method="POST">
                                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                            </form>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                            <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                                <form action="buildings.php" method="POST">
                                                    <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                            <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                            </form>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <?php }
                    if ($value['name'] == 'Chantier spatial') {
                        if ($buildings['name'] == 'Usine de robots' && $buildings['level'] >= 2) { ?>
                            <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                                <tr>
                                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                    <form action="buildings.php" method="POST">
                                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                    </form>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                    <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                        <form action="buildings.php" method="POST">
                                            <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                    </form>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    <?php }
                    if ($value['name'] == 'Hangar de m&eacute;tal') { ?>
                        <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } ?>
                    <?php }
                    if ($value['name'] == 'Hangar de cristal') { ?>
                        <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } ?>
                    <?php }
                    if ($value['name'] == 'R&eacute;servoir de deut&eacute;rium') { ?>
                        <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } ?>
                    <?php }
                    if ($value['name'] == 'Laboratoire de recherche') { ?>
                        <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?></th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

<?php } ?>