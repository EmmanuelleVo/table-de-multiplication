<?php

require('validation.php');


if (isset($_GET['nbtables'], $_GET['nbvaleurs'])) {
    $old = $_GET;
    $data = validated();
}


?>

<!-- Début du template d’affichage -->

<!DOCTYPE html>
<html lang="fr-be">
<head>
    <meta charset="utf-8">
    <title>Les tables de multiplication</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<main class="container">
    <h1>Les tables de multiplication</h1>
    <section>
        <h2>Indiquez quelles tables vous souhaitez</h2>
        <form action="index.php" method="get">
            <div class="form-group">
                <label class="control-label" for="nbtables">Nombre de tables : </label>
                <input class="form-control" id="nbtables" type="text" name="nbtables"
                       value="<?= $old['tableNum'] ?? 0 ?>">
            </div>
            <div class="form-group">
                <label class="control-label" for="nbvaleurs">Nombre de valeurs : </label>
                <input class="form-control" id="nbvaleurs" type="text" name="nbvaleurs"
                       value="<?= $old['valueNum'] ?? 0 //ici $old ?>">
            </div>
            <input type="submit">
        </form>
    </section>
    <?php if(isset($data['error'])) :?>
        <p><?= $data['error'];?></p>
    <?php elseif($data['tableNum'] > 0 && $data['valueNum'] > 0) :?>
        <section>
            <h2>Voici vos tables</h2>
            <table class="table table-striped table-bordered">
                <caption>Les <?= $data['valueNum'] ?> premières valeurs des <?= $data['tableNum'] ?> premières tables
                </caption>
                <tr>
                    <th class="vide">&nbsp;</th>
                    <?php for($head = 1; $head <= $data['tableNum']; $head++): ?>
                    <th scope="col"><?= $head; ?></th>
                    <?php endfor ?>
                </tr>
                <?php for($row = 1; $row <= $data['valueNum']; $row++): ?>
                <tr>
                    <th scope="row"><?= $row ?></th>
                    <?php for($cell = 1; $cell <= $data['tableNum']; $cell++): ?>
                    <td><?= $row ?> * <?= $cell ?> = <?= $row * $cell; ?></td>
                    <?php endfor ?>
                </tr>
                <?php endfor ?>
            </table>
        </section>
    <?php endif; ?>
</main>
</body>
</html>