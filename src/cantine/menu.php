<?php

/**
 * Crée des menus à partir du tableau food avec un élément de chaque clé
 *
 *
 * @param array $food le tableau des ingrédients rangés par type
 * @param int $i le nombre de menus à créer
 * @param mixed $jouravant le tableau des indices des éléments tirés au hasard pour le menu-1
 * @return array
 */
function createRandomMenu($food, $i, $jouravant = null)
{
    $return = [];
    while($i > 0) {
        foreach ($food as $key => $value) {
            $minimum = 0;
            if (is_array($value)) {
                if ($jouravant === null || !array_key_exists($key, $jouravant)) {
                    $jouravant[$key] = null;
                }
                $maximum = count($value) - 1;
                if ($maximum > -1) {
                    do {
                        if ($maximum > 0) {
                            $alea = random_int($minimum, $maximum);
                        } elseif ($jouravant[$key] === null) {
                            $alea = 0;
                        } else {
                            $alea = null;
                        }
                    } while ($jouravant[$key] === $alea && $maximum > 0);
                    $jouravant[$key] = $alea;
                    $return[$i][$key] = $value[$alea];
                }
            }
        }
        $i = $i -1;
    }
    save_menu($return);
    return $return;
}

/**
 * créée le fichier csv des menus et sauvegarde les données
 *
 * @param [array] $tab
 * @return void
 */
function save_menu($tab) {
    $fp = fopen('src/data/menu.csv', 'w');
    foreach($tab as $value ){
        fputcsv($fp, $value, ";");
    }
    // fwrite($fp, "coucou"); va ecrire dans notre fichier csv $fp la string "coucou"
    fclose($fp); //ferme le fichier
}

/**
 * lit le fichier csv des menus
 *
 * @return array
 */
function readmenu(){
    $fp = fopen('src/data/menu.csv', 'r');
    while($data = fgetcsv($fp, null, ';')){
        $return[] = $data;
    }
    return $return;
}

