<?php 
addUser();

?>
<h2>Création d'un nouvel utilisateur</h2>
<form class ="w-50 d-flex flex-column justify-content-center align-items-center"action="<?php echo $_SERVER['PHP_SELF']; ?>?page=createuti" method="post">
<label for="name">Nom utilisateur</label>
<input type="text" name="name" id="name">
<label for="pw">Mot de passe</label>
<input type="password" name="pw" id="pw">
<label for="confpw">Confirmer mot de passe</label>
<input type="password" name="confpw" id="confpw">
<input type="submit" name ="submit" value="créer">
</form>