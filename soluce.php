<?php
define('SITE_TITLE', 'Les tables de multiplication');

$tableCount = 0;
$valueCount = 0;

$errors = [];

if (isset($_GET['nbvaleurs'], $_GET['nbtables'])) {
    if (ctype_digit($_GET['nbvaleurs'])) {
        $valueCount = (int) $_GET['nbvaleurs'];
        if ($valueCount <= 1) {
            $errors ['valueErrors'] = 'Je ne peux calculer les tables que s’il y a plus d’une valeur dans la table';
        }
    } else {
        $errors ['valueErrors'] = 'Vous n’avez pas entré un entier positif pour déterminer le nombre de valeurs à calculer';
    }
    if (ctype_digit($_GET['nbtables'])) {
        $tableCount = (int) $_GET['nbtables'];
    } else {
        $errors ['tableErrors'] = 'Vous n’avez pas entré un entier positif pour déterminer le nombre de tables à calculer';
    }
}


?>

<!-- Début du template d’affichage -->

<!DOCTYPE html>
<html lang="fr-be">
<head>
    <meta charset="utf-8">
    <title><?= SITE_TITLE ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<main class="container">
    <h1>Les tables de multiplication</h1>
    <section>
        <h2>Indiquez quelles tables vous souhaitez</h2>
        <form action="soluce.php" method="get">
            <div class="form-group<?= isset($errors['tableErrors']) ? ' has-error' : '' ?>">
                <label class="control-label" for="nbtables">Nombre de tables : </label>
                <input class="form-control" id="nbtables" type="text" name="nbtables"
                       value="<?= $tableCount ?>">
                <?php if (isset($errors['tableErrors'])): ?>
                    <span class="help-block"><?= $errors['tableErrors'] ?></span>
                <?php endif ?>
            </div>
            <div class="form-group<?= isset($errors['valueErrors']) ? ' has-error' : '' ?>">
                <label class="control-label" for="nbvaleurs">Nombre de valeurs : </label>
                <input class="form-control" id="nbvaleurs" type="text" name="nbvaleurs"
                       value="<?= $valueCount ?>">
                <?php if (isset($errors['valueErrors'])): ?>
                    <span class="help-block"><?= $errors['valueErrors'] ?></span>
                <?php endif ?>
            </div>
            <input type="submit">
        </form>
    </section>
    <?php if ($tableCount > 0 && $valueCount > 1): ?>
        <section>
            <h2>Voici vos tables</h2>
            <table class="table table-striped table-bordered">
                <caption>Les <?= $valueCount ?> premières valeurs des <?= $tableCount ?> premières tables</caption>
                <tr>
                    <th class="vide">&nbsp;</th>
                    <?php for ($cell = 1; $cell <= $tableCount; $cell++): ?>
                        <th scope="col"><?= $cell ?></th>
                    <?php endfor ?>
                </tr>
                <?php for ($row = 1; $row <= $valueCount; $row++): ?>
                    <tr>
                        <th scope="row"><?= $row ?></th>
                        <?php for ($cell = 1; $cell <= $tableCount; $cell++): ?>
                            <td><?= $row ?> * <?= $cell ?> = <?= $row * $cell ?></td>
                        <?php endfor ?>
                    </tr>
                <?php endfor ?>
            </table>
        </section>
    <?php endif ?>
</main>
</body>
</html>

