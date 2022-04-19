<?php
include_once('./src/core/security.php');
connect();

?>
<h2>Connexion</h2>
<form class="m-5" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=connexion" method="post">
    <input type="text" name="nom" id="nom" placeholder="Nom utilisateur" required>
    <input type="password" name="pass" id="pass" placeholder="Mot de passe" required>
    <input type="submit" value="Se connecter" name='connexion'>
</form>