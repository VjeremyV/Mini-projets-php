<?php
/**
 * vérifie si les variables $_POST relatives à la connexion sont correctes et ouvre une session
 *
 * @return void
 */
function connect()
{
    session_start();
    if (isset($_POST['connexion']) && $_POST['connexion'] === 'Se connecter') {
        session_destroy();
        if (isset($_POST['nom']) && isset($_POST['pass'])) {
            if (search_user($_POST['nom'], $_POST['pass']) === true) {
                session_start();
                $_SESSION['user'] = true;
                header('location: http://localhost/template/index.php');
            }
        }
    } elseif (isset($_SESSION['user']) && $_SESSION['user'] === true) {
        header('location: http://localhost/template/index.php');
    } else {
        session_destroy();
    }
}

/**
 * verifie si un utilisateur est connecté
 *
 * @return boolean
 */
function is_connected()
{
    session_start();
    if (isset($_SESSION['user']) && $_SESSION['user'] === true) {
        return true;
    }
    session_destroy();
    return false;
}

/**
 * detruit une session / déconnecte un utilisateur
 *
 * @return void
 */
function disconnect()
{
    if (isset($_SESSION['user'])) {
        session_destroy();
    }
}

/**
 * lie le fichier csv relatif aux utilisateurs
 *
 * @return array
 */
function readUser()
{
    if ($fp = fopen('src/data/users.csv', 'r')) {
        while ($data = fgetcsv($fp, null, ';')) {
            $return[$data[0]] = $data[1];
        }
        fclose($fp);
        return $return;
    } else {
        echo 'Erreur pendant l\'ouverture';
    }
}

/**
 * recharche un utilisateur dans le fihier csv
 *
 * @param [string] $name
 * @param [string] $pw
 * @return boolean
 */
function search_user($name, $pw)
{
    $users = readUser();
    if (is_array($users) && array_key_exists($name, $users) && password_verify($pw,$users[$name])) {
        return true;
    }
    return false;
}

/**
 * ajoute un utilisateur dans le fichier csv
 *
 * @return void
 */
function addUser()
{
    $errors = [];
    if (isset($_POST['submit']) && $_POST['submit'] === "créer") {
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            if (isset($_POST['pw']) && !empty($_POST['pw'])) {
                if (isset($_POST['confpw']) && $_POST['confpw'] === $_POST['pw']) {
                    $user = search_user_by_name($_POST['name']);
                    if($user == true){
                        $errors[] = "le nom utilisateur est déjà utilisé";
                    } else {
                        if(save_user($_POST['name'], $_POST['pw'])){
                            echo "l'utilisateur a bien été enregistré !";
                        } else {
                            $errors[] = "Un problème est survenu lors de l'enregistrement <br>";
                        }
                    }
                } else { 
                    $errors[] = "les mots de passe doivent correspondrent<br>";
                }
            } else {
                $errors[] = "le champs mot de passe est obligatoire<br>";
            }
        } else {
            $errors[] = "le champs utilisateur est obligatoire<br>";
        }
    }
    if(count($errors) > 0){
        foreach($errors as $error){
            echo $error;
        }
    }
}

/**
 * recherche un utilisateur par son nom dans le fichier csv
 *
 * @param [string] $name
 * @return boolean
 */
function search_user_by_name($name)
{
    $users = readUser();
    if (array_key_exists($name, $users)) {
        return true;
    }
    return false;
}

/**
 * sauvegarde un utilisateur dans le fichier csv
 *
 * @param [string] $name
 * @param [string] $pw
 * @return boolean
 */
function save_user($name, $pw)
{
    if ($fp = fopen(dirname(__FILE__) . '/../data/users.csv', 'a')) {
        if (fputcsv($fp, [$name, password_hash($pw,PASSWORD_DEFAULT)], ";")) {
            return true;
        } else {
            return false;
        }
    }
}

/**
 * affiche la liste des utilisateurs du fichier csv
 *
 * @return void
 */
function showUser()
{
    $users = readUser();
    foreach ($users as $user => $value) {
        echo "<tr><td>" . $user . "</td></tr>";
    }
}
