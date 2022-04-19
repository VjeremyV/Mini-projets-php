<?php
include_once('./src/core/security.php');
addUser();
?>
<h2>Liste utilisateurs</h2>
<table class='table text-center table-striped w-50'>
    <thead>
        <th scope="col">Noms utilisateurs</th>
<?php showUser();
?>

</table>

<a href="./index.php?page=createuti">Créer un Utilisateur</a>