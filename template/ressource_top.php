<?php
require_once '../controllers/ressourceControllers.php';
?>
<table class="widthTable">
    <tbody>
        <tr class="text-center">
            <td><img class="imgSize" src="../assets/img/metal.gif"></td>
            <td><img class="imgSize" src="../assets/img/cristal.gif"></td>
            <td><img class="imgSize" src="../assets/img/deuterium.gif"></td>
            <td><img class="imgSize" src="../assets/img/energie.gif"></td>
        </tr>
        <tr class="text-center">
            <td>Métal</td>
            <td>Cristal</td>
            <td>Deutérium</td>
            <td>Energie</td>
        </tr>
        <tr class="text-center">
            <td><?= $arrayRessource['metal'] ?></td>
            <td><?= $arrayRessource['cristal'] ?></td>
            <td><?= $arrayRessource['deuterium'] ?></td>
            <?php if ($arrayRessource['energy'] >= 0) { ?>
                <td><?= $arrayRessource['energy'] ?></td>
            <?php } else { ?>
                <td><span class="red"><?= $arrayRessource['energy'] ?></span></td>
            <?php } ?>
        </tr>
    </tbody>
</table>