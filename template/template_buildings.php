<?php
require_once '../controllers/buildingsControllers.php';
?>

<table class="widthTable">
    <tbody>
        <?php $stop = 1 ?>
        <?php foreach ($arrayBuilding as $buildings) {
            if ($buildings['built'] == 0) {

                //On recupere les infos necessaire pour calculer le temps de contruction
                $infosUsineRobots = $buildingsObj->getInfosOnOneBuilding('Usine de robots', $_SESSION['User']['id']);
                $infosUsineNanites = $buildingsObj->getInfosOnOneBuilding('Usine de nanites', $_SESSION['User']['id']);

                $temp = $buildings['timestamp'] + timeBuiltForBuilding($buildingsLevelTimeBuilt[$buildings['name']][$buildings['level']]['Metal'], $buildingsLevelTimeBuilt[$buildings['name']][$buildings['level']]['Cristal'], $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']);
                $temp_remaining = $temp - time();

                if ($temp_remaining > 0) {
                    if ($stop == 1) { ?>
                        <tr>
                            <th colspan="3" class="titleMenu">Liste de contruction</th>
                        </tr>
                    <?php }
                    $stop = 2; ?>
                    <tr>
                        <th colspan="2"><?= $buildings['name'] ?> (Niveaux <?= $buildings['level'] ?>)</th>
                        <th colspan="1" id="compte_a_rebours"></th>
                    </tr>
                <?php } else {
                    $buildingsObj->finishCreateBuilding($buildings['Building_id']);
                } ?>
        <?php }
        } ?>
    </tbody>
</table>


<table class="widthTable">
    <tbody>
        <?php
        foreach ($json_data['buildings'] as $value) {
            if ($value['name'] == 'Mine de métal') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                        <?php if (empty($building)) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                        <?php if ($building[0]['built'] == 1) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Mine de cristal') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                        <?php if (empty($building)) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                        <?php if ($building[0]['built'] == 1) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Synthétiseur de deutérium') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                        <?php if (empty($building)) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= $building[0]['built'] == 1 && $building[0]['level'] == 1 ? ($building[0]['built'] == 0 && $building[0]['level'] > 1 ? ($building[0]['level'] - 1) : $building[0]['level']) : 0 ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                        <?php if ($building[0]['built'] == 1) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Centrale électrique solaire') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                        <?php if (empty($building)) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                        <?php if ($building[0]['built'] == 1) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Usine de robots') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                        <?php if (empty($building)) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                        <?php if ($building[0]['built'] == 1) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Usine de nanites') {
                $infosUsineRobots = $buildingsObj->getInfosOnOneBuilding('Usine de robots', $_SESSION['User']['id']);
                $infosTechnoOrdi = $researchObj->getInfosForOneResearch('Technologie Ordinateur', $_SESSION['User']['id']);
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if ($infosUsineRobots[0]['level'] >= 10) {
                    if ($infosTechnoOrdi[0]['level'] >= 10) {
                        if (empty($building)) { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                                <?php if (empty($building)) { ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                    </form>
                                <?php } else { ?>
                                    <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                                <?php } ?>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                                <?php if ($building[0]['built'] == 1) { ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                        <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                    </form>
                                <?php } else { ?>
                                    <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Chantier spatial') {
                $infosUsineRobots = $buildingsObj->getInfosOnOneBuilding('Usine de robots', $_SESSION['User']['id']);
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if ($infosUsineRobots[0]['level'] >= 2) {
                    if (empty($building)) { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                            <?php if (empty($building)) { ?>
                                <form action="buildings.php" method="POST">
                                    <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                    <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                            <?php } ?>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                                <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                            <?php if ($building[0]['built'] == 1) { ?>
                                <form action="buildings.php" method="POST">
                                    <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                    <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            <?php } else { ?>
                                <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Hangar de métal') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                        <?php if (empty($building)) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                        <?php if ($building[0]['built'] == 1) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Hangar de cristal') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                        <?php if (empty($building)) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                        <?php if ($building[0]['built'] == 1) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Réservoir de deutérium') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                        <?php if (empty($building)) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                        <?php if ($building[0]['built'] == 1) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Laboratoire de recherche') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                        <?php if (empty($building)) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?= $building[0]['metal_price'] == 0 ? '' : 'Metal : ' . $building[0]['metal_price'] ?> <?= $building[0]['cristal_price'] == 0 ? '' : 'Cristal : ' . $building[0]['cristal_price'] ?> <?= $building[0]['deuterium'] == 0 ? '' : 'Deuterium : ' . $building[0]['deuterium'] ?> <?= $building[0]['energy_cost'] == 0 ? '' : 'Energie : ' . $building[0]['energy_cost'] ?> <br><br> Temps de construction : <?= $building[0]['time_built'] / 60 ?> Minute</th>
                        <?php if ($building[0]['built'] == 1) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                            </form>
                        <?php } else { ?>
                            <th><input type=submit size=5 maxlength=5 value="Construire" disabled></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>