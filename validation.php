<?php

function validated():array {
    if(!is_numeric($_GET['nbtables']) && !is_numeric($_GET['nbvaleurs'])) {
        return ['error' => 'Aucun des nombres fournis ne sont valides'];
    }
    if(!is_numeric($_GET['nbtables'])) {
        return ['error' => 'Le nombre de tables fourni n’est pas valide'];
    }
    if(!is_numeric($_GET['nbvaleurs'])) {
        return ['error' => 'Le nombre de valeurs fourni n’est pas valide'];
    }
    if($_GET['nbtables'] < 1 && $_GET['nbvaleurs'] < 1){
        return ['error' => 'Entrer des nombre supérieurs à 0.'];
    }
    if($_GET['nbtables'] < 1){
        return ['error' => 'Entrer un nombre de tables supérieur à 0'];
    }
    if($_GET['nbvaleurs'] < 1){
        return ['error' => 'Entrer un nombre de valeurs supérieur à 0'];
    }
    if((float)$_GET['nbtables'] === 0.0 && (float)$_GET['nbvaleurs'] === 0.0){
        return ['error' => 'Entrer des nombre supérieurs à 0.'];
    }


    //TODO virgule flottant

    $tableNum = (int)$_GET['nbtables'];
    $valueNum = (int)$_GET['nbvaleurs'];
    return compact(
        'tableNum',
        'valueNum'
    );
}



