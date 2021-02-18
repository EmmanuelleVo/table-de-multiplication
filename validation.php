<?php

function validated():array {
    if(!is_numeric($_GET['nbtables']) && !is_numeric($_GET['nbvaleurs'])) {
        return ['error' => 'Aucun des nombres fournis ne sont valides'];
    }
    if(!is_numeric($_GET['nbtables'])) {
        return ['error' => 'Le nombre de table fourni n’est pas valide'];
    }
    if(!is_numeric($_GET['nbvaleurs'])) {
        return ['error' => 'Le nombre de valeur fourni n’est pas valide'];
    }
    if($_GET['nbtables'] === 0 && $_GET['nbvaleurs']){
        return ['error' => 'Entrer des nombre supérieurs à 0.'];
    }

    $tableNum = (int)$_GET['nbtables'];
    $valueNum = (int)$_GET['nbvaleurs'];
    return compact(
        'tableNum',
        'valueNum'
    );
}



