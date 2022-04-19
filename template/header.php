<header>
    <h1 class="text-center mb-5">Mixin PHP & Html</h1>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=plats">Les plats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php?page=menu">Les menus</a>
                    </li>
                    <?php if ($is_connected === true) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?page=createmenu">Créer des menus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?page=createfood">Ajoutez des aliments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?page=utilisateurs">Utilisateurs</a>
                        </li>
                    <?php endif ?>
                    <?php
                    if ($is_connected === false) :
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?page=connexion">connexion</a>
                        </li>
                    <?php
                    else :
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?page=deconnexion">deconnexion</a>
                        </li>
                    <?php
                    endif;
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    
</header>