<?php 
if ($is_connected === false){
    header('location: http://localhost/template/index.php');
}
include_once(dirname(__FILE__)."/../src/cantine/menu.php");
include_once(dirname(__FILE__)."/../src/cantine/plat.php");

?>
<h2>Création d'un nouveau menu</h2>
<table class='table text-center table-striped'>
    <thead>
        <th scope="col">Fruits</th>
        <th scope="col">Légumes</th>
        <th scope="col">Viandes</th>
        <th scope="col">Patisseries</th>
    </thead>
<?php
    $array = read_plats();
    $tab = createRandomMenu($array,7);
    foreach($tab as $menu) {
        echo "<tr>";
        foreach($menu as $plat){
            echo "<td>".$plat."</td>";
        }
        echo "</tr>";
    }
?>
</table>