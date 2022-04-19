<!DOCTYPE html>
<?php
include_once('src/core/security.php');
$is_connected = is_connected();
?>
<html lang="en">

<?php
include_once('./template/head.php');
?>

<body>
    <?php
    include_once('./template/header.php');
    ?>
    <main class="d-flex flex-column align-items-center p-5">
        <?php
        include_once('./src/core/routeur.php')
        ?>
    </main>
    <?php 
    include_once('./template/footer.php');
    ?>
</body>

</html>