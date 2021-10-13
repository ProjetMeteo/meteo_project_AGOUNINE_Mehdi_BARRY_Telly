<?php require 'header.php' ?>

<?php
include 'utils.php';
if (isset($_GET['recherche'])) {


    if (isset($_GET['ville']) && !empty($_GET['ville'])) {
        $resultat = findVille($_GET['ville']);
        $_SESSION['lastVille'] = $_GET['ville'];
    } else {
        $resultat = findVille('Paris'); // VILLE PAR DEFAULT 
    }
}

if (isset($_GET['favori'])) {

    addFavorite($_SESSION['user'], $_SESSION['lastVille']);
}

if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    $villesFavorites = findFavorite($_SESSION['user']);
}
?>

<h1>ACCUEIL API METEO</h1>

</br>

<?php
if (isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($villesFavorites) && !empty($villesFavorites)) {
    foreach ($villesFavorites as $ville) {
        $infosVille = findVille($ville['Nom']);

?>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"> <?= $infosVille['name'] ?> </h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $infosVille['temperature'] ?>°c</h6>
                <p class="card-text"><?= $infosVille['description'] ?></p>
            </div>
        </div>

<?php
    }
} ?>


<form action="" method="GET">
    <input type="text" name="ville" placeholder="écrivez le nom d'une ville">

    <button type="submit" name="recherche" class="btn btn-primary">Rechercher</button>
</form>

<?php if (isset($resultat)) { ?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"> <?= $resultat['name'] ?> </h5>
            <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                <form method="GET">
                    <button name="favori" class="btn btn-success">
                        Ajouter aux favoris
                    </button>
                </form>
            <?php } ?>
            <h6 class="card-subtitle mb-2 text-muted"><?= $resultat['temperature'] ?>°c</h6>
            <p class="card-text"><?= $resultat['description'] ?></p>
        </div>
    </div>

<?php } ?>

</body>

</html>