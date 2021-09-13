<?php

foreach ($json_data['buildings'] as $value) {
    $displayBuilding = 0;
    foreach ($arrayBuilding as $buildings) {
        if ($value['name'] == 'Mine de métal') { ?>
            <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1 && $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                    <form action="buildings.php" method="POST">
                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } elseif (!in_array($value['name'], $buildings) && $displayBuilding == 0) {
                $displayBuilding; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0 ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                    <form action="buildings.php" method="POST">
                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } ?>
        <?php }
        if ($value['name'] == 'Mine de cristal') {
            if ($value['name'] != $buildings['name']) {
                continue;
            } ?>
            <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1 && $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                    <form action="buildings.php" method="POST">
                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } elseif ($value['name'] == $buildings['name'] && $buildings['built'] == 0 || $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                    <form action="buildings.php" method="POST">
                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } ?>
        <?php }
        if ($value['name'] == 'Synthétiseur de deutérium') { ?>
            <?php if (in_array($value['name'], $buildings) && $buildings['built'] == 1 && $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                    <form action="buildings.php" method="POST">
                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } elseif (!in_array($value['name'], $buildings) && $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                    <form action="buildings.php" method="POST">
                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } ?>
        <?php }
        if ($value['name'] == 'Centrale &eacute;lectrique solaire') {
            if ($value['name'] != $buildings['name']) {
                continue;
            } ?>
            <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1 && $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                    <form action="buildings.php" method="POST">
                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } elseif ($value['name'] == $buildings['name'] && $buildings['built'] == 0 || $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                    <form action="buildings.php" method="POST">
                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } ?>
        <?php }
        if ($value['name'] == 'Usine de robots') {
            if ($value['name'] != $buildings['name']) {
                continue;
            } ?>
            <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1 && $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                    <form action="buildings.php" method="POST">
                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } elseif ($value['name'] == $buildings['name'] && $buildings['built'] == 0 || $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                    <form action="buildings.php" method="POST">
                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } ?>
            <?php }
        if ($value['name'] == 'Usine de nanites') {
            if ($value['name'] != $buildings['name']) {
                continue;
            }
            foreach ($arrayResearch as $research) {
                if ($buildings['name'] == 'Usine de robots' && $buildings['level'] >= 10) {
                    if ($research['name'] == 'Technologie Ordinateur' && $research['level'] >= 10) { ?>
                        <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1 && $displayBuilding == 0) {
                            $displayBuilding++; ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                                    <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                                <form action="buildings.php" method="POST">
                                    <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                                </form>
                            </tr>
                        <?php } elseif ($value['name'] == $buildings['name'] && $buildings['built'] == 0 || $displayBuilding == 0) {
                            $displayBuilding++; ?>
                            <tr>
                                <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                                <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
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
            if ($value['name'] != $buildings['name']) {
                continue;
            }
            if ($buildings['name'] == 'Usine de robots' && $buildings['level'] >= 2) { ?>
                <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1 && $displayBuilding == 0) {
                    $displayBuilding++; ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                            <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                        <form action="buildings.php" method="POST">
                            <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php } elseif ($value['name'] == $buildings['name'] && $buildings['built'] == 0 || $displayBuilding == 0) {
                    $displayBuilding++; ?>
                    <tr>
                        <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                        <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                        <form action="buildings.php" method="POST">
                            <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                            <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                        </form>
                    </tr>
                <?php } ?>
            <?php } ?>
        <?php }
        if ($value['name'] == 'Hangar de m&eacute;tal') {
            if ($value['name'] != $buildings['name']) {
                continue;
            } ?>
            <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1 && $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                    <form action="buildings.php" method="POST">
                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } elseif ($value['name'] == $buildings['name'] && $buildings['built'] == 0 || $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                    <form action="buildings.php" method="POST">
                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } ?>
        <?php }
        if ($value['name'] == 'Hangar de cristal') {
            if ($value['name'] != $buildings['name']) {
                continue;
            } ?>
            <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1 && $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                    <form action="buildings.php" method="POST">
                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } elseif ($value['name'] == $buildings['name'] && $buildings['built'] == 0 || $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                    <form action="buildings.php" method="POST">
                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } ?>
        <?php }
        if ($value['name'] == 'R&eacute;servoir de deut&eacute;rium') {
            if ($value['name'] != $buildings['name']) {
                continue;
            } ?>
            <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1 && $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                    <form action="buildings.php" method="POST">
                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } elseif ($value['name'] == $buildings['name'] && $buildings['built'] == 0 || $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
                    <form action="buildings.php" method="POST">
                        <input type="hidden" name="buildingName" value="<?= $value['name'] ?>">
                        <th><input type=submit name="newBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } ?>
        <?php }
        if ($value['name'] == 'Laboratoire de recherche') {
            if ($value['name'] != $buildings['name']) {
                continue;
            } ?>
            <?php if ($value['name'] == $buildings['name'] && $buildings['built'] == 1 && $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $buildings['level'] ?>) <br><br><?= $value['description'] ?> <br><br>
                        <?= $buildings['metal_price'] == 0 ? '' : 'Metal : ' . $buildings['metal_price'] ?> <?= $buildings['cristal_price'] == 0 ? '' : 'Cristal : ' . $buildings['cristal_price'] ?> <?= $buildings['deuterium'] == 0 ? '' : 'Deuterium : ' . $buildings['deuterium'] ?> <?= $buildings['energy_cost'] == 0 ? '' : 'Energie : ' . $buildings['energy_cost'] ?> <br><br> Temps de construction : <?= $buildings['time_built'] / 60 ?> Minute</th>
                    <form action="buildings.php" method="POST">
                        <th><input type=submit name="updateBuilding" size=5 maxlength=5 value="Construire"></th>
                    </form>
                </tr>
            <?php } elseif ($value['name'] == $buildings['name'] && $buildings['built'] == 0 || $displayBuilding == 0) {
                $displayBuilding++; ?>
                <tr>
                    <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
                    <th><?= $value['name'] ?> (Niveaux <?= $value['name'] == $buildings['name'] && $buildings['level'] > 0 ? ($buildings['level'] == 1 ? 0 : $buildings['level'] - 1) : 0  ?>) <br><br><?= $value['description'] ?> <br><br> <?= $value['ressource'] ?> <br><br> <?= $value['temp_built'] ?></th>
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