<?php
require_once '../controllers/overviewControllers.php';
?>
<table class="widthTable">
    <tr>
        <td colspan="4" class="titleMenu"><a href="options.php"><?= $arrayInfosPlanet['name'] ?> / <?= $_SESSION['User']['name'] ?></a></td>
    </tr>
    <tr>
        <th colspan="2">Heure :</th>
        <th colspan="2"><?= date(DATE_RFC2822) ?></th>
    </tr>
    <tr>
        <th colspan="2">Joueur online :</th>
        <th colspan="2">{NumberMembersOnline}</th>
    </tr>
    <tr>
        <td colspan="4" class="titleMenu">Evenement</td>
    </tr>
    <tr>
        <th colspan="4"><img src="<?= $arrayInfosPlanet['image'] ?>" height="200" width="200"></th>
    </tr>
    <tr>
        <th>Diametre</th>
        <th colspan="3"><?= $arrayInfosPlanet['diameter'] ?> km</th>
    </tr>
    <th>Place planete</th>
    <th colspan="3 justify-content-center">
        <div class="pourcentStyle">
            <div>0 / <?= $arrayInfosPlanet['field_max'] ?></div>
    </th>
    <tr>
        <th>Temperature</th>
        <th colspan="3">0 °C / <?= $arrayInfosPlanet['temp_max'] ?> °C</th>
    </tr>
</table>