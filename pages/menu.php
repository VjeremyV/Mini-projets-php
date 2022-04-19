<?php
include_once(dirname(__FILE__)."/../src/cantine/menu.php");

?>
<h2>Menus enregistrés</h2>
<table class='table text-center table-striped'>
    <thead>
        <th scope="col">Fruits</th>
        <th scope="col">Légumes</th>
        <th scope="col">Viandes</th>
        <th scope="col">Patisseries</th>
    </thead>
<?php
    $tab = readmenu();
    foreach($tab as $menu) {
        echo "<tr>";
        foreach($menu as $plat){
            echo "<td>".$plat."</td>";
        }
        echo "</tr>";
    }
?>
</table>
