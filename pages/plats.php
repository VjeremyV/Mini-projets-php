<?php 
include_once(dirname(__FILE__).'/../src/cantine/plat.php');
?>
<h2>Plats disponibles</h2>
<table class="table table-striped text-center">
        <thead>
            <th scope="col">Catégorie
                <button class="btn btn-primary">
                    <a class="text-decoration-none text-white" href='./index.php?page=plats&tricat=<?php echo (isset($_GET['tricat']) && ($_GET['tricat'] === "asc")) ? 'desc' : 'asc'; ?>'>
                        tri <?php echo (isset($_GET['tricat']) && ($_GET['tricat'] === "asc")) ? 'descendant' : 'ascendant'; ?>
                    </a>
                </button>
            </th>
            <th scope="col">Nom
                <button class="btn btn-primary">
                    <a class="text-decoration-none text-white" href='./index.php?page=plats&tri=<?php echo (isset($_GET['tri']) && ($_GET['tri'] === "asc")) ? 'desc' : 'asc'; ?>'>
                        tri <?php echo (isset($_GET['tri']) && ($_GET['tri'] === "asc")) ? 'descendant' : 'ascendant'; ?>
                    </a>
                </button>
            </th>
        </thead>
        <?php
        $array = read_plats();
        if (isset($_GET['tri'])) {
           $triPlat = triPlat($array, $_GET['tri']);
            foreach ($triPlat as $key => $value) {
                echo "<tr><td>$value</td><td> $key</td></tr>";
            }
        } else {
            foreach ($array as $key => $value) {
                if(isset($_GET['tricat'])){
                $array = triCat($array, $_GET['tricat']);
                }
                foreach ($array as $key => $value) {
                    foreach($value as $aliment){
                        echo "<tr><td>$key</td><td> $aliment</td></tr>";
                    }
                }

            }
        }
        ?>
    </table>