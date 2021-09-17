<?php
require_once '../controllers/overviewControllers.php';
?>
<table class="widthTable">
    <tr>
        <td class="c text-center" colspan="4"><a href="options.php"><?= $arrayInfosPlanet['name'] ?> / <?= $_SESSION['User']['name'] ?></a></td>
    </tr>
    <tr>
        <th>Heure</th>
        <th colspan="3">
            <div><?= date(DATE_RFC2822) ?></div>
        </th>
    </tr>
    <tr>
        <th>Joueur Online</th>
        <th colspan="3">{NumberMembersOnline}</th>
    </tr>
    <tr>
        <td colspan="4" class="c text-center">Evenement</td>
    </tr>
    <tr>
        <th>{moon_img}<br>{moon}</th>
        <th colspan="2"><img src="../assets/img/planeten/eisplanet01.jpg" height="200" width="200"></th>
        <th class="s">
            <table class="s">
                <tr>{anothers_planets}</tr>
            </table>
        </th>
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