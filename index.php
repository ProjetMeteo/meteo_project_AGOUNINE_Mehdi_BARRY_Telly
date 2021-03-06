<?php
require 'header.php';
include 'php_utils/utils.php';

if (isset($_GET['recherche'])) {
    if (isset($_GET['ville']) && !empty($_GET['ville'])) {
        $resultat = findVille($_GET['ville']);
        $_SESSION['lastVille'] = $_GET['ville'];
    } else {
        $resultat = findVille('Paris'); // VILLE PAR DEFAULT lorsque la recherche est vide
    }
}



if (isset($_GET['favori'])) {
    addFavorite($_SESSION['user'], $_SESSION['lastVille']); // $_Session['lastVille'] contient le nom de la derniere ville recherché
    header('location:index.php');
}

?>

</br>
<form autocomplete="off" action="" method="GET">

    <input autocomplete="false" name="hidden" type="text" style="display:none;"> <!-- EMPECHE CHROME DE METTRE SES PUTINS DE SUGGESTIONS SOUS L'INPUT -->

    <input autocomplete="off" id="search" class="form-control" type="text" name="ville" placeholder="écrivez le nom d'une ville">
    <div id="match-list">
    </div>

    <div class="recherche"><button type="submit" name="recherche" class="btn btn-primary mt-3">Rechercher</button></div>
</form>

<?php if (isset($resultat)) { ?>

    <div class="card mt-4" style="width: 100%;">
        <div class="card-body">
            <div class="row ligne">
                <h5 class="card-title col-6"> <?= $resultat['name'] ?> </h5>
                <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                    <form class="col-6" method="GET">
                        <button name="favori" class="btn btn-sm btn-success">
                            Ajouter aux favoris
                        </button>
                    </form>
                <?php } ?>
            </div>
            <div class="row">
                <h6 class="card-subtitle mb-2 text-muted temperature"><?= $resultat['temperature'] ?>°c</h6>
                <img src="https://openweathermap.org/img/wn/<?= $resultat['icon'] ?>@2x.png" alt="icon">
            </div>
            <p class="card-text"><?= $resultat['description'] ?></p>
        </div>
    </div>

<?php } ?>

<script src="js/search_service.js"></script>
</body>

</html>