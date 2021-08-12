<?php
$json_file = file_get_contents('./assets/json/ressource.json');
$json_data = json_decode($json_file, true);
?>

<table style="width: 519px;">
    <tbody>
        <?php
        foreach($json_data['research'] as $value){
        ?>
        <tr>
            <th><img src="<?= $value['img'] ?>" alt="<?= $value['name'] ?>"></th>
            <th><?= $value['name'] ?> (Niveaux ...) <br><br> <?= $value['description'] ?> <br><br> Prix de la construction : ........</th>
            <th><input type=submit size=5 maxlength=5 value="Construire"></th>
        </tr>
        <?php } ?>
    </tbody>
</table>