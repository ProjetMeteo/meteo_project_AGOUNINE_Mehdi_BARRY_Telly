<?php
require 'header.php';
include 'utils.php';

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
}


// si l'utilisateur est connecté on récupère ses villes favorites
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    $villesFavorites = findFavorite($_SESSION['user']);
}
?>

</br>
<h2>VOS VILLES FAVORITES</h2>
<div class="row">
<?php
if (isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($villesFavorites) && !empty($villesFavorites)) {
    foreach ($villesFavorites as $ville) {
        $infosVille = findVille($ville['Nom']);

?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"> <?= $infosVille['name'] ?> </h5>
                <div class="row">
                    <h6 class="card-subtitle mb-2 text-muted"><?= $infosVille['temperature'] ?>°c</h6>
                    <img src="https://openweathermap.org/img/wn/<?= $infosVille['icon'] ?>@2x.png" alt="icon">
                </div>
                <p class="card-text"><?= $infosVille['description'] ?></p>
            </div>
        </div>

<?php
    }
} ?>
</div>

<form autocomplete="off" action="" method="GET">

    <input autocomplete="false" name="hidden" type="text" style="display:none;"> <!-- EMPECHE CHROME DE METTRE SES PUTINS DE SUGGESTIONS SOUS L'INPUT -->

    <input autocomplete="off" id="search" class="form-control" type="text" name="ville" placeholder="écrivez le nom d'une ville">
    <div id="match-list">
    </div>

    <button type="submit" name="recherche" class="btn btn-primary mt-3">Rechercher</button>
</form>

<?php if (isset($resultat)) { ?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <div class="row">
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