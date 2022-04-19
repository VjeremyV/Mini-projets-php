<?php

/**
 * tri les plats par ordre alphabétique
 *
 * @param [array] $plats le tableau des plats à trier
 * @param [type] $ordre asc pour ordre alpgabétique sinon desc
 * @return array
 */
function triPlat($plats, $ordre)
{
    $aliments = [];
    foreach ($plats as $key => $value) {
        foreach ($value as $aliment) {
            $aliments[$aliment] = $key;
        }
    }
    if ($ordre === "asc") {
        ksort($aliments);
    } else {
        krsort($aliments);
    }
    return $aliments;
};

/**
 * tri les plats par ordre alphabétique sur le nom de la catégorie du plat
 *
 * @param [array] $plats le tableau des plats à trier
 * @param [type] $ordre asc pour ordre alpgabétique sinon desc
 * @return array
 */
function triCat($plats, $ordre)
{
    if ($ordre === "asc") {
        ksort($plats);
    } else {
        krsort($plats);
    }
    return $plats;
}

/**
 * lits les plats du fichier csv
 *
 * @return array
 */
function read_plats()
{
    $fp = fopen('src/data/plat.csv', 'r');
    while ($data = fgetcsv($fp, null, ";")) {
        $return[$data[0]][] = $data[1];
    }
    return $return;
}

/**
 * vérifie les champs du formulaire
 *
 * @return void
 */
function checkform()
{
    $errors = [];
    if (!isset($_POST['category']) || $_POST['category'] === "") {
        $errors[] = "vous devez choisir une catégorie !!" . "<br>";
    }
    if (!isset($_POST['name']) || $_POST['name'] === "") {
        $errors[] = "vous devez choisir un aliment !!" . "<br>";
    }
    $plat = read_plats();
    $_POST['name'] = htmlspecialchars(ucfirst(trim($_POST['name'])));
    if (array_key_exists($_POST['category'], $plat)) {
        if (in_array($_POST['name'], $plat[$_POST['category']])) {
            $errors[] = "le plat existe déjà pour la catégorie séléctionnée <br>";
        }
    }
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo $error;
        }
    } else {
        if (($fp = fopen('src/data/plat.csv', "a")) === false) {
            echo 'une erreur est survenue <br>';
        } else {
            if (fputcsv($fp, $_POST, ";") === false) {
                echo 'une erreur est survenue <br>';
            }
            echo "le plat est bien créé";
        }
        fclose($fp);
    }
}
