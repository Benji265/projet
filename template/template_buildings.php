<?php
require_once '../controllers/buildingsControllers.php';
?>

<table class="widthTable">
    <tbody>
        <?php $stop = 1 ?>
        <?php $nb = 1 ?>
        <?php foreach ($arrayBuilding as $buildings) {
            if ($buildings['built'] == 0) {

                require('../controllers/arrayBuildingsLevel.php');

                $temp_remaining = $temp - time();

                if ($temp_remaining > 0) {
                    if ($stop == 1) { ?>
                        <tr>
                            <th colspan="4" class="titleMenu">Liste de contruction</th>
                        </tr>
                    <?php }
                    $stop = 2;  ?>
                    <tr>
                        <th colspan="2"><?= $buildings['name'] ?> (Niveaux <?= $buildings['level'] ?>)</th>
                        <th colspan="1" id="timer" data-timeBuilt="<?= $temp ?>"></th>
                        <form action="buildings.php" method="POST">
                            <input type="hidden" name="name" value="<?= $buildings['name'] ?>">
                            <input type="hidden" name="level" value="<?= $buildings['level'] ?>">
                            <th colspan="1"><button type="submit" class="noStyleButton text-white" name="cancel" value="annuler"><b>Annuler</b></button></th>
                        </form>
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
                $infosRessourceUser = $planetObj->getInfosPlanetForOneUser($_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > costMetalForMineDeMetalPerLevel(1)) { ?>
                                <?= 'Metal : ' . costMetalForMineDeMetalPerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Metal : ' . '<span class="red">' . costMetalForMineDeMetalPerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > costCristalForMineDeMetalPerLevel(1)) { ?>
                                <?= 'Cristal : ' . costCristalForMineDeMetalPerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Cristal : ' . '<span class="red">' . costCristalForMineDeMetalPerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            <?= 'Energie : ' . costEnergyForMineDeMetalPerLevel(1) ?> <br><br>
                            Temps de construction : <?= displayTimeBuilt(costMetalForMineDeMetalPerLevel(1), costCristalForMineDeMetalPerLevel(1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if (empty($building) && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForMineDeMetalPerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForMineDeMetalPerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > $building[0]['cristal_price']) { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForMineDeMetalPerLevel($building[0]['level']) : 'Cristal : ' . $building[0]['cristal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForMineDeMetalPerLevel($building[0]['level']) : 'Cristal : ' . '<span class="red">' . $building[0]['cristal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            <?= $building[0]['energy_cost'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Energie : ' . costEnergyForMineDeMetalPerLevel($building[0]['level']) : 'Energie : ' . $building[0]['energy_cost']) ?> <br><br>
                            Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForMineDeMetalPerLevel($building[0]['level'] + 1), costCristalForMineDeMetalPerLevel($building[0]['level'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForMineDeMetalPerLevel($building[0]['level']), costCristalForMineDeMetalPerLevel($building[0]['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Mine de cristal') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > costMetalForMineDeCristalPerLevel(1)) { ?>
                                <?= 'Metal : ' . costMetalForMineDeCristalPerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Metal : ' . '<span class="red">' . costMetalForMineDeCristalPerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > costCristalForMineDeCristalPerLevel(1)) { ?>
                                <?= 'Cristal : ' . costCristalForMineDeCristalPerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Cristal : ' . '<span class="red">' . costCristalForMineDeCristalPerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            <?= 'Energie : ' . costEnergyForMineDeCristalPerLevel(1) ?> <br><br>
                            Temps de construction : <?= displayTimeBuilt(costMetalForMineDeCristalPerLevel(1), costCristalForMineDeCristalPerLevel(1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if (empty($building) && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForMineDeCristalPerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForMineDeCristalPerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > $building[0]['cristal_price']) { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForMineDeCristalPerLevel($building[0]['level']) : 'Cristal : ' . $building[0]['cristal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForMineDeCristalPerLevel($building[0]['level']) : 'Cristal : ' . '<span class="red">' . $building[0]['cristal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            <?= $building[0]['energy_cost'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Energie : ' . costEnergyForMineDeCristalPerLevel($building[0]['level']) : 'Energie : ' . $building[0]['energy_cost']) ?> <br><br>
                            Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForMineDeCristalPerLevel($building[0]['level'] + 1), costCristalForMineDeCristalPerLevel($building[0]['level'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForMineDeCristalPerLevel($building[0]['level']), costCristalForMineDeCristalPerLevel($building[0]['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Synthétiseur de deutérium') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > costMetalForDeuteriumPerLevel(1)) { ?>
                                <?= 'Metal : ' . costMetalForDeuteriumPerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Metal : ' . '<span class="red">' . costMetalForDeuteriumPerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > costCristalForDeuteriumPerLevel(1)) { ?>
                                <?= 'Cristal : ' . costCristalForDeuteriumPerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Cristal : ' . '<span class="red">' . costCristalForDeuteriumPerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            <?= 'Energie : ' . costEnergyForDeuteriumPerLevel(1) ?> <br><br>
                            Temps de construction : <?= displayTimeBuilt(costMetalForDeuteriumPerLevel(1), costCristalForDeuteriumPerLevel(1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if (empty($building) && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= $building[0]['built'] == 1 && $building[0]['level'] == 1 ? ($building[0]['built'] == 0 && $building[0]['level'] > 1 ? ($building[0]['level'] - 1) : $building[0]['level']) : 0 ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForDeuteriumPerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForDeuteriumPerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > $building[0]['cristal_price']) { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForDeuteriumPerLevel($building[0]['level']) : 'Cristal : ' . $building[0]['cristal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForDeuteriumPerLevel($building[0]['level']) : 'Cristal : ' . '<span class="red">' . $building[0]['cristal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            <?= $building[0]['energy_cost'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Energie : ' . costEnergyForDeuteriumPerLevel($building[0]['level']) : 'Energie : ' . $building[0]['energy_cost']) ?> <br><br>
                            Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForDeuteriumPerLevel($building[0]['level'] + 1), costCristalForDeuteriumPerLevel($building[0]['level'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForDeuteriumPerLevel($building[0]['level']), costCristalForDeuteriumPerLevel($building[0]['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Centrale électrique solaire') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > costMetalForCentralSolairePerLevel(1)) { ?>
                                <?= 'Metal : ' . costMetalForCentralSolairePerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Metal : ' . '<span class="red">' . costMetalForCentralSolairePerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > costCristalForCentralSolairePerLevel(1)) { ?>
                                <?= 'Cristal : ' . costCristalForCentralSolairePerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Cristal : ' . '<span class="red">' . costCristalForCentralSolairePerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            <?= 'Energie : ' . costEnergyForCentralSolairePerLevel(1) ?> <br><br>
                            Temps de construction : <?= displayTimeBuilt(costMetalForCentralSolairePerLevel(1), costCristalForCentralSolairePerLevel(1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if (empty($building) && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForCentralSolairePerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForCentralSolairePerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > $building[0]['cristal_price']) { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForCentralSolairePerLevel($building[0]['level']) : 'Cristal : ' . $building[0]['cristal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForCentralSolairePerLevel($building[0]['level']) : 'Cristal : ' . '<span class="red">' . $building[0]['cristal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            <?= $building[0]['energy_cost'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Energie : ' . costEnergyForCentralSolairePerLevel($building[0]['level']) : 'Energie : ' . $building[0]['energy_cost']) ?> <br><br>
                            Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForCentralSolairePerLevel($building[0]['level'] + 1), costCristalForCentralSolairePerLevel($building[0]['level'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForCentralSolairePerLevel($building[0]['level']), costCristalForCentralSolairePerLevel($building[0]['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Usine de robots') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br> <?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > costMetalForUsineDeRobotsPerLevel(1)) { ?>
                                <?= 'Metal : ' . costMetalForUsineDeRobotsPerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Metal : ' . '<span class="red">' . costMetalForUsineDeRobotsPerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > costCristalForUsineDeRobotsPerLevel(1)) { ?>
                                <?= 'Cristal : ' . costCristalForUsineDeRobotsPerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Cristal : ' . '<span class="red">' . costCristalForUsineDeRobotsPerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['deuterium'] > costDeuteriumForUsineDeRobotsPerLevel(1)) { ?>
                                <?= 'Deuterium : ' . costDeuteriumForUsineDeRobotsPerLevel(1) ?> <br><br>
                            <?php } else { ?>
                                <?= 'Deuterium : ' . '<span class="red">' . costDeuteriumForUsineDeRobotsPerLevel(1) . '</span>' ?> <br><br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            Temps de construction : <?= displayTimeBuilt(costMetalForUsineDeRobotsPerLevel(1), costCristalForUsineDeRobotsPerLevel(1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if (empty($building) && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForUsineDeRobotsPerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForUsineDeRobotsPerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > $building[0]['cristal_price']) { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForUsineDeRobotsPerLevel($building[0]['level']) : 'Cristal : ' . $building[0]['cristal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForUsineDeRobotsPerLevel($building[0]['level']) : 'Cristal : ' . '<span class="red">' . $building[0]['cristal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['deuterium'] > $building[0]['deuterium_price']) { ?>
                                <?= $building[0]['deuterium_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Deuterium : ' . costDeuteriumForUsineDeRobotsPerLevel($building[0]['level']) : 'Deuterium : ' . $building[0]['deuterium_price']) ?> <br><br>
                            <?php } else { ?>
                                <?= $building[0]['deuterium_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Deuterium : ' . costDeuteriumForUsineDeRobotsPerLevel($building[0]['level']) : 'Deuterium : ' . '<span class="red">' . $building[0]['deuterium_price'] . '</span>') ?> <br><br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForUsineDeRobotsPerLevel($building[0]['level'] + 1), costCristalForUsineDeRobotsPerLevel($building[0]['level'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForUsineDeRobotsPerLevel($building[0]['level']), costCristalForUsineDeRobotsPerLevel($building[0]['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
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
                                <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br>
                                    <?php if ($infosRessourceUser['metal'] > costMetalForUsineDeNanitesPerLevel(1)) { ?>
                                        <?= 'Metal : ' . costMetalForUsineDeNanitesPerLevel(1) ?> <br>
                                    <?php } else { ?>
                                        <?= 'Metal : ' . '<span class="red">' . costMetalForUsineDeNanitesPerLevel(1) . '</span>' ?> <br>
                                        <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                    <?php }
                                    if ($infosRessourceUser['cristal'] > costCristalForUsineDeNanitesPerLevel(1)) { ?>
                                        <?= 'Cristal : ' . costCristalForUsineDeNanitesPerLevel(1) ?> <br>
                                    <?php } else { ?>
                                        <?= 'Cristal : ' . '<span class="red">' . costCristalForUsineDeNanitesPerLevel(1) . '</span>' ?> <br>
                                        <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                    <?php }
                                    if ($infosRessourceUser['deuterium'] > costDeuteriumForUsineDeNanitesPerLevel(1)) { ?>
                                        <?= 'Deuterium : ' . costDeuteriumForUsineDeNanitesPerLevel(1) ?> <br><br>
                                    <?php } else { ?>
                                        <?= 'Deuterium : ' . '<span class="red">' . costDeuteriumForUsineDeNanitesPerLevel(1) . '</span>' ?> <br><br>
                                        <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                    <?php } ?>
                                    Temps de construction : <?= displayTimeBuilt(costMetalForUsineDeNanitesPerLevel(1), costCristalForUsineDeNanitesPerLevel(1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                                <?php if (empty($building) && $errorMsg['Ressource']) { ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                        <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                                    </form>
                                <?php } else { ?>
                                    <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                                <?php } ?>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                        <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForUsineDeNanitesPerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br>
                                    <?php } else { ?>
                                        <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForUsineDeNanitesPerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br>
                                        <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                    <?php }
                                    if ($infosRessourceUser['cristal'] > $building[0]['cristal_price']) { ?>
                                        <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForUsineDeNanitesPerLevel($building[0]['level']) : 'Cristal : ' . $building[0]['cristal_price']) ?> <br>
                                    <?php } else { ?>
                                        <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForUsineDeNanitesPerLevel($building[0]['level']) : 'Cristal : ' . '<span class="red">' . $building[0]['cristal_price'] . '</span>') ?> <br>
                                        <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                    <?php }
                                    if ($infosRessourceUser['deuterium'] > $building[0]['deuterium_price']) { ?>
                                        <?= $building[0]['deuterium_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Deuterium : ' . costDeuteriumForUsineDeNanitesPerLevel($building[0]['level']) : 'Deuterium : ' . $building[0]['deuterium_price']) ?> <br><br>
                                    <?php } else { ?>
                                        <?= $building[0]['deuterium_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Deuterium : ' . costDeuteriumForUsineDeNanitesPerLevel($building[0]['level']) : 'Deuterium : ' . '<span class="red">' . $building[0]['deuterium_price'] . '</span>') ?> <br><br>
                                        <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                    <?php } ?>
                                    Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForUsineDeNanitesPerLevel($building[0]['level'] + 1), costCristalForUsineDeNanitesPerLevel($building[0]['level'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForUsineDeNanitesPerLevel($building[0]['level']), costCristalForUsineDeNanitesPerLevel($building[0]['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                                <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                                    <form action="buildings.php" method="POST">
                                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                        <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                        <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                                    </form>
                                <?php } else { ?>
                                    <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
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
                            <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br>
                                <?php if ($infosRessourceUser['metal'] > costMetalForChantierSpatialPerLevel(1)) { ?>
                                    <?= 'Metal : ' . costMetalForChantierSpatialPerLevel(1) ?> <br>
                                <?php } else { ?>
                                    <?= 'Metal : ' . '<span class="red">' . costMetalForChantierSpatialPerLevel(1) . '</span>' ?> <br>
                                    <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                <?php }
                                if ($infosRessourceUser['cristal'] > costCristalForChantierSpatialPerLevel(1)) { ?>
                                    <?= 'Cristal : ' . costCristalForChantierSpatialPerLevel(1) ?> <br>
                                <?php } else { ?>
                                    <?= 'Cristal : ' . '<span class="red">' . costCristalForChantierSpatialPerLevel(1) . '</span>' ?> <br>
                                    <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                <?php }
                                if ($infosRessourceUser['deuterium'] > costDeuteriumForChantierSpatialPerLevel(1)) { ?>
                                    <?= 'Deuterium : ' . costDeuteriumForChantierSpatialPerLevel(1) ?> <br><br>
                                <?php } else { ?>
                                    <?= 'Deuterium : ' . '<span class="red">' . costDeuteriumForChantierSpatialPerLevel(1) . '</span>' ?> <br><br>
                                    <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                <?php } ?>
                                Temps de construction : <?= displayTimeBuilt(costMetalForChantierSpatialPerLevel(1), costCristalForChantierSpatialPerLevel(1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                            <?php if (empty($building) && empty($errorMsg['Ressource'])) { ?>
                                <form action="buildings.php" method="POST">
                                    <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                    <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                                </form>
                            <?php } else { ?>
                                <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                            <?php } ?>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                            <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                                <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                    <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForChantierSpatialPerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br>
                                <?php } else { ?>
                                    <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForChantierSpatialPerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br>
                                    <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                <?php }
                                if ($infosRessourceUser['cristal'] > $building[0]['cristal_price']) { ?>
                                    <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForChantierSpatialPerLevel($building[0]['level']) : 'Cristal : ' . $building[0]['cristal_price']) ?> <br>
                                <?php } else { ?>
                                    <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForChantierSpatialPerLevel($building[0]['level']) : 'Cristal : ' . '<span class="red">' . $building[0]['cristal_price'] . '</span>') ?> <br>
                                    <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                <?php }
                                if ($infosRessourceUser['deuterium'] > $building[0]['deuterium_price']) { ?>
                                    <?= $building[0]['deuterium_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Deuterium : ' . costDeuteriumForChantierSpatialPerLevel($building[0]['level']) : 'Deuterium : ' . $building[0]['deuterium_price']) ?> <br><br>
                                <?php } else { ?>
                                    <?= $building[0]['deuterium_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Deuterium : ' . costDeuteriumForChantierSpatialPerLevel($building[0]['level']) : 'Deuterium : ' . '<span class="red">' . $building[0]['deuterium_price'] . '</span>') ?> <br><br>
                                    <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                                <?php } ?>
                                Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForChantierSpatialPerLevel($building[0]['level'] + 1), costCristalForChantierSpatialPerLevel($building[0]['level'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForChantierSpatialPerLevel($building[0]['level']), costCristalForChantierSpatialPerLevel($building[0]['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                            <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                                <form action="buildings.php" method="POST">
                                    <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                    <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                    <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                                </form>
                            <?php } else { ?>
                                <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
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
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > costMetalForHangarDeMetalPerLevel(1)) { ?>
                                <?= 'Metal : ' . costMetalForHangarDeMetalPerLevel(1) ?> <br><br>
                            <?php } else { ?>
                                <?= 'Metal : ' . '<span class="red">' . costMetalForHangarDeMetalPerLevel(1) . '</span>' ?> <br><br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            Temps de construction : <?= displayTimeBuilt(costMetalForHangarDeMetalPerLevel(1), 0, $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if (empty($building) && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForHangarDeMetalPerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br><br>
                            <?php } else { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForHangarDeMetalPerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br><br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForHangarDeMetalPerLevel($building[0]['level'] + 1), 0, $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForHangarDeMetalPerLevel($building[0]['level']), 0, $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Hangar de cristal') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > costMetalForHangarDeCristalPerLevel(1)) { ?>
                                <?= 'Metal : ' . costMetalForHangarDeCristalPerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Metal : ' . '<span class="red">' . costMetalForHangarDeCristalPerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > costCristalForHangarDeCristalPerLevel(1)) { ?>
                                <?= 'Cristal : ' . costCristalForHangarDeCristalPerLevel(1) ?> <br><br>
                            <?php } else { ?>
                                <?= 'Cristal : ' . '<span class="red">' . costCristalForHangarDeCristalPerLevel(1) . '</span>' ?> <br><br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            Temps de construction : <?= displayTimeBuilt(costMetalForHangarDeCristalPerLevel(1), costCristalForHangarDeCristalPerLevel(1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if (empty($building) && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForHangarDeCristalPerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForHangarDeCristalPerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > $building[0]['cristal_price']) { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForHangarDeCristalPerLevel($building[0]['level']) : 'Cristal : ' . $building[0]['cristal_price']) ?> <br><br>
                            <?php } else { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForHangarDeCristalPerLevel($building[0]['level']) : 'Cristal : ' . '<span class="red">' . $building[0]['cristal_price'] . '</span>') ?> <br><br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForHangarDeCristalPerLevel($building[0]['level'] + 1), costCristalForHangarDeCristalPerLevel($building[0]['level'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForHangarDeCristalPerLevel($building[0]['level']), costCristalForHangarDeCristalPerLevel($building[0]['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Réservoir de deutérium') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > costMetalForHangarDeDeutPerLevel(1)) { ?>
                                <?= 'Metal : ' . costMetalForHangarDeDeutPerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Metal : ' . '<span class="red">' . costMetalForHangarDeDeutPerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > costCristalForHangarDeDeutPerLevel(1)) { ?>
                                <?= 'Cristal : ' . costCristalForHangarDeDeutPerLevel(1) ?> <br><br>
                            <?php } else { ?>
                                <?= 'Cristal : ' . '<span class="red">' . costCristalForHangarDeDeutPerLevel(1) . '</span>' ?> <br><br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            Temps de construction : <?= displayTimeBuilt(costMetalForHangarDeDeutPerLevel(1), costCristalForHangarDeDeutPerLevel(1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if (empty($building) && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForHangarDeDeutPerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForHangarDeDeutPerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > $building[0]['cristal_price']) { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForHangarDeDeutPerLevel($building[0]['level']) : 'Cristal : ' . $building[0]['cristal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForHangarDeDeutPerLevel($building[0]['level']) : 'Cristal : ' . '<span class="red">' . $building[0]['cristal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForHangarDeDeutPerLevel($building[0]['level'] + 1), costCristalForHangarDeDeutPerLevel($building[0]['level'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForHangarDeDeutPerLevel($building[0]['level']), costCristalForHangarDeDeutPerLevel($building[0]['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
                <?php }
            if ($value['name'] == 'Laboratoire de recherche') {
                $building = $buildingsObj->getInfosOnOneBuilding($value['name'], $_SESSION['User']['id']);
                if (empty($building)) { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux 0) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > costMetalForLaboDeRecherchePerLevel(1)) { ?>
                                <?= 'Metal : ' . costMetalForLaboDeRecherchePerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Metal : ' . '<span class="red">' . costMetalForLaboDeRecherchePerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > costCristalForLaboDeRecherchePerLevel(1)) { ?>
                                <?= 'Cristal : ' . costCristalForLaboDeRecherchePerLevel(1) ?> <br>
                            <?php } else { ?>
                                <?= 'Cristal : ' . '<span class="red">' . costCristalForLaboDeRecherchePerLevel(1) . '</span>' ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['deuterium'] > costDeuteriumForLaboDeRecherchePerLevel(1)) { ?>
                                <?= 'Deuterium : ' . costDeuteriumForLaboDeRecherchePerLevel(1) ?> <br><br>
                            <?php } else { ?>
                                <?= 'Deuterium : ' . '<span class="red">' . costDeuteriumForLaboDeRecherchePerLevel(1) . '</span>' ?> <br><br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            Temps de construction : <?= displayTimeBuilt(costMetalForLaboDeRecherchePerLevel(1), costCristalForLaboDeRecherchePerLevel(1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if (empty($building) && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <th><button type=submit name="newBuilding" class="noStyleButton text-white" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= ($building[0]['built'] == 0 && $building[0]['level'] == 1) ? 0 : (($building[0]['built'] == 0 && $building[0]['level'] > 1) ? ($building[0]['level'] - 1) : $building[0]['level']) ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?php if ($infosRessourceUser['metal'] > $building[0]['metal_price']) { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForLaboDeRecherchePerLevel($building[0]['level']) : 'Metal : ' . $building[0]['metal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['metal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Metal : ' . costMetalForLaboDeRecherchePerLevel($building[0]['level']) : 'Metal : ' . '<span class="red">' . $building[0]['metal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['cristal'] > $building[0]['cristal_price']) { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForLaboDeRecherchePerLevel($building[0]['level']) : 'Cristal : ' . $building[0]['cristal_price']) ?> <br>
                            <?php } else { ?>
                                <?= $building[0]['cristal_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Cristal : ' . costCristalForLaboDeRecherchePerLevel($building[0]['level']) : 'Cristal : ' . '<span class="red">' . $building[0]['cristal_price'] . '</span>') ?> <br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php }
                            if ($infosRessourceUser['deuterium'] > $building[0]['deuterium_price']) { ?>
                                <?= $building[0]['deuterium_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Deuterium : ' . costDeuteriumForLaboDeRecherchePerLevel($building[0]['level']) : 'Deuterium : ' . $building[0]['deuterium_price']) ?> <br><br>
                            <?php } else { ?>
                                <?= $building[0]['deuterium_price'] == 0 ? '' : ($building[0]['built'] == 0 ? 'Deuterium : ' . costDeuteriumForLaboDeRecherchePerLevel($building[0]['level']) : 'Deuterium : ' . '<span class="red">' . $building[0]['deuterium_price'] . '</span>') ?> <br><br>
                                <?php $errorMsg['Ressource'] = 'Insuffisant'; ?>
                            <?php } ?>
                            Temps de construction : <?= $building[0]['built'] == 1 ? displayTimeBuilt(costMetalForLaboDeRecherchePerLevel($building[0]['level'] + 1), costCristalForLaboDeRecherchePerLevel($building[0]['level'] + 1), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) : displayTimeBuilt(costMetalForLaboDeRecherchePerLevel($building[0]['level']), costCristalForLaboDeRecherchePerLevel($building[0]['level']), $infosUsineRobots[0]['level'], $infosUsineNanites[0]['level']) ?></th>
                        <?php if ($building[0]['built'] == 1 && empty($errorMsg['Ressource'])) { ?>
                            <form action="buildings.php" method="POST">
                                <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                                <input type="hidden" name="buildingLevel" value="<?= $building[0]['level'] ?>">
                                <th><button type=submit class="noStyleButton text-white" name="updateBuilding" size=5 maxlength=5 value="construire"><b>Construire</b></button></th>
                            </form>
                        <?php } else { ?>
                            <th><button type=submit class="noStyleButton text-white" size=5 maxlength=5 value="construire" disabled><b>Construire</b></button></th>
                        <?php } ?>
                    </tr>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </tbody>
</table>