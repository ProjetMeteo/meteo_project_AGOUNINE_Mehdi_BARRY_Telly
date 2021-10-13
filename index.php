<?php require 'header.php' ?>

<?php 

if(isset($_GET['recherche'])){
    include 'utils.php';

    if (isset($_GET['ville']) && !empty($_GET['ville'])){
        $resultat = findVille($_GET['ville']);
    }
    else{
        $resultat = findVille('Paris'); // VILLE PAR DEFAULT 
    }
}
?>

<h1>ACCUEIL API METEO</h1>

</br>


<form action="" method="GET">
    <input type="text" name="ville" placeholder="écrivez le nom d'une ville">

    <button type="submit" name="recherche" class="btn btn-primary">Rechercher</button>
</form>

<?php if(isset($resultat)) { ?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title"> <?= $resultat['name'] ?> </h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $resultat['temperature'] ?>°c</h6>
        <p class="card-text"><?= $resultat['description'] ?></p>
     </div>
    </div>

<?php } ?>

</body>
</html>