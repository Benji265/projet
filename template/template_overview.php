<?php
require_once '../controllers/overviewControllers.php';
?>
<table class="widthTable">
    <tr>
        <td class="c text-center" colspan="4"><?= $arrayInfosPlanet['name'] ?> / <?= $_SESSION['User']['name'] ?></td>
    </tr>
    <tr>
        <th>Heure</th>
        <th colspan="3">
            <div><?= date(DATE_RFC2822) ?></div>
        </th>
    </tr>
    <tr>
        <th>{MembersOnline}</th>
        <th colspan="3">{NumberMembersOnline}</th>
    </tr>
    <tr>
        <td colspan="4" class="c text-center">{Events}</td>
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
        <th colspan="3">{planet_diameter} km</th>
    </tr>
    <th>Taille planete</th>
    <th colspan="3">
        <div class="pourcentStyle">
            <div>{case_pourcentage}</div>
    </th>
    <tr>
        <th>Temperature</th>
        <th colspan="3">0 / {tempmax}</th>
    </tr>
</table>