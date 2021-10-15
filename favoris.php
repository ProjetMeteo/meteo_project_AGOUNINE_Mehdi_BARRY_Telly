<?php
require 'header.php';
require 'php_utils/utils.php';

$villesFavorites = findFavorite($_SESSION['user']);

if(isset($_GET['deleteAllFavoris'])){
    deleteAllFavoris($_SESSION['user']);
    header('location:favoris.php');
}

?>

</br>
<h2>VOS VILLES FAVORITES</h2>

<form class="col-6" method="GET">
    <button name="deleteAllFavoris" class="btn btn-sm btn-warning">
        Supprimer tous les favoris
    </button>
</form>

<div class="row">
    <?php
    if (isset($_SESSION['user']) && !empty($_SESSION['user']) && isset($villesFavorites) && !empty($villesFavorites)) {
        foreach ($villesFavorites as $ville) {
            $infosVille = findVille($ville['Nom'], false);
            $idFavori = $ville['id'];

            $favDel = "ville-".$ville['id'];
            if(isset($_GET[$favDel])){
                deleteFavori($ville['id'], $_SESSION['user']);
                header('location:favoris.php');
            }

    ?>
            <div class="card col-4" style="width: 18rem;">
                <div class="card-body">
                    <div class="row align-items-center">
                        <h5 class="card-title"> <?= $infosVille['name'] ?> </h5>
                        <form class="col-6" method="GET">
                            <button name="ville-<?= $ville['id']?>" class="btn btn-sm btn-warning">
                                supprimer
                            </button>
                        </form>
                    </div>
                    <div class="row align-items-center">
                        <h6 class="card-subtitle text-muted"><?= $infosVille['temperature'] ?>°c</h6>
                        <img src="https://openweathermap.org/img/wn/<?= $infosVille['icon'] ?>@2x.png" alt="icon">
                    </div>
                    <p class="card-text"><?= $infosVille['description'] ?></p>
                </div>
            </div>

    <?php
        }
    }

    ?>
</div>
</body>

</html>