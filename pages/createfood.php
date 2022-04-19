<?php
if ($is_connected === false){
    header('location: http://localhost/template/index.php');
}
include_once(dirname(__FILE__)."../../src/cantine/plat.php");

if (isset($_POST['submit'])) {
    unset($_POST['submit']);
    
    // echo "<pre>";
    // var_dump(read_plats());
    // echo "</pre>";
    
    checkform();
} 
?>
<h2>Ajout d'un nouvel ingrédient</h2>
<form action="<?php echo $_SERVER['PHP_SELF'];?>?page=createfood" method="post" class=" m-2">
    <label for="category">Choisissez le type de plat</label>
    <select name="category" id="category">
        <option value="">Veuillez choisir une catégorie</option>
        <option value="fruit" <?php  echo (isset($_POST['category']) && $_POST['category'] === 'fruit') ? "selected" : ""; ?>>Fruit</option>
        <option value="legume"<?php  echo (isset($_POST['category']) && $_POST['category'] === 'legume') ? "selected" : ""; ?>>Legume</option>
        <option value="viande" <?php  echo (isset($_POST['category']) && $_POST['category'] === 'viande') ? "selected" : ""; ?>>Viande</option>
        <option value="patisserie" <?php  echo (isset($_POST['category']) && $_POST['category'] === 'patisserie') ? "selected" : ""; ?>>Patisserie</option>
    </select>
    <label for="name">Nom de l'aliment</label>
    <input type="text" name="name" id="name" value = "<?php  echo (isset($_POST['name']) && $_POST['name'] !== '') ? $_POST['name'] : ""; ?>">
    <input type="submit" name="submit" value="createfood">
</form>

