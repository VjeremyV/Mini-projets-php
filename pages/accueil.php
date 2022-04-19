<h2>Bienvenue!</h2>
<?php
if ($is_connected === true) {
    echo '<p class="text-center w-50 fs-3">Vous êtes Connecté</p>';
} else {
    echo '<p class="text-center w-50 fs-3">Vous êtes Déconnecté</p>';
}
