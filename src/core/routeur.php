<?php

$page = 'accueil.php';
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'plats':
            $page = "plats.php";
            break;
        case 'menu':
            $page = "menu.php";
            break;
        case 'createmenu':
            $page = "createmenu.php";
            break;
        case 'createfood':
            $page = "createfood.php";
            break;
        case 'connexion':
            $page = "connexion.php";
            break;
        case 'deconnexion':
            $page = "deconnexion.php";
            break;
        case 'utilisateurs':
            $page = "utilisateurs.php";
            break;
        case 'createuti':
            $page = "createuti.php";
            break;
        default:
            break;
    }
}
include_once(dirname(__FILE__) . "/../../pages/" . $page);
