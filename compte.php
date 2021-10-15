<?php require 'header.php' ?>

<?php
if($_SESSION['user']){
    $idUser = $_SESSION['user'];
}else{
    header('location:index.php');
}
require 'php_utils/utils.php';
$lignesHistorique = findHistory($idUser);
$infosUser = findUser($idUser);

if (isset($_POST['submit'])) {
    if (!isset($_POST['nom']) | empty($_POST['nom']) | !isset($_POST['prenom']) | empty($_POST['prenom']) | !isset($_POST['mail']) | empty($_POST['mail']) | !isset($_POST['mdp']) | empty($_POST['mdp'])) {
        echo 'UN CHAMP EST VIDE !';
    } else {
        if (preg_match("/^[a-zA-Z-' ]*$/",$_POST['mail'])) { // regex de verification pour l'email
            echo 'le mail ne respecte pas le bon format';
          }else{
              // ENREGISTREMENT DES DONNEES EN BDD ICI
              updateUser($idUser,$_POST['mail'],$_POST['mdp'],$_POST['nom'],$_POST['prenom']);
              header('location:connexion.php');

          }
    }
}

if(isset($_GET['deleteAllHistorique'])){
    deleteAllHistorique($_SESSION['user']);
    header('location:compte.php');
}
?>

<h1>MON COMPTE</h1>

<div class="infos">
    <h3>MES INFOS</h3>

    <form action="" method="POST">

        <label class="form-label" for="nom">Nom : </label>
        <input class="form-control disable-input" type="text" name="nom" value="<?= $infosUser['nom'] ?>" disabled>
        </br>

        <label class="form-label" for="prenom">Prenom : </label>
        <input class="form-control disable-input" type="text" name="prenom" value="<?= $infosUser['prenom'] ?>" disabled>
        </br>

        <label class="form-label" for="mail">Email : </label>
        <input class="form-control disable-input" t type="text" name="mail" value="<?= $infosUser['mail'] ?>" disabled>
        </br>

        <label class="form-label" for="mdp">Mot de Passe : </label>
        <input class="form-control disable-input" type="text" name="mdp" value="<?= $infosUser['mdp'] ?>" disabled>
        </br>

        <input id="unlock" class="btn btn-primary" name="unlock" value="modifier">
        <input class="btn btn-success" type="submit" name="submit" value="enregistrer les modifications">
        <button id="deleteAccount" class="btn btn-danger">Supprimer le compte</button>

    </form>
</div>

<div class="historique my-3">
    <h3>HISTORIQUE DE RECHERCHE</h3>

    <form class="col-6" method="GET">
    <button name="deleteAllHistorique" class="btn btn-sm btn-warning">
        Supprimer l'historique
    </button>
</form>

<div class="row">
    <?php
    if (!empty($lignesHistorique)) {
        foreach ($lignesHistorique as $ligne) {
            $dateTab = explode(' ', $ligne['creation']);
            $dateFormated = $dateTab[0] . " à " . $dateTab[1]; //ajoute le "à" entre la date et l'heure
    ?>
            <div class="card m-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"> <?= $ligne['villeName'] ?> </h5>
                    <h6 class="card-subtitle mb-2 text-muted">recherche effectué le <?= $dateFormated ?></h6></br>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $ligne['temperature'] ?>°c</h6>
                    <p class="card-text"><?= $ligne['meteo'] ?></p>
                </div>
            </div>

    <?php }
    } ?>
</div>
</div>

<script src="js/form_service.js"></script>
</body>

</html>