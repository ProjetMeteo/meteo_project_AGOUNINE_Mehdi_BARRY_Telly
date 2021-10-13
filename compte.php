<?php require 'header.php' ?>

<?php 
    $idUser = $_SESSION['user'];
    require 'utils.php';
    $lignesHistorique = findHistory($idUser);
    $infosUser = findUser($idUser);

    if(isset($_POST['submit'])){
        if (!isset($_POST['nom']) | empty($_POST['nom']) | !isset($_POST['prenom']) | empty($_POST['prenom']) | !isset($_POST['mail']) | empty($_POST['mail']) | !isset($_POST['mdp']) | empty($_POST['mdp'])){
            echo 'UN CHAMP EST VIDE !';
        }else{
            // ENREGISTREMENT DES DONNEES EN BDD ICI
            updateUser($idUser ,$_POST['mail'],$_POST['mdp'],$_POST['nom'],$_POST['prenom']);
            header('location:compte.php');
        }
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
    <input class="form-control disable-input"t type="text" name="mail" value="<?= $infosUser['mail'] ?>" disabled>
    </br>

    <label class="form-label" for="mdp">Mot de Passe : </label>
    <input class="form-control disable-input" type="text" name="mdp" value="<?= $infosUser['mdp'] ?>" disabled>
    </br>

    <input id="unlock" class="btn btn-primary" name ="unlock" value="modifier les informations">
    <input class="btn btn-success" type="submit" name ="submit" value="enregistrer les modifications">

    </form>
</div>

<div class="historique">
    <h3>HISTORIQUE DE RECHERCHE</h3>


<?php 
    if(!empty($lignesHistorique)) {
        foreach ($lignesHistorique as $ligne){
            $dateTab = explode(' ',$ligne['creation']);
            $dateFormated = $dateTab[0] . " à " . $dateTab[1];
?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title"> <?= $ligne['villeName'] ?> </h5>
        <h6 class="card-subtitle mb-2 text-muted">recherche effectué le <?= $dateFormated ?></h6></br>
        <h6 class="card-subtitle mb-2 text-muted"><?= $ligne['temperature'] ?>°c</h6>
        <p class="card-text"><?= $ligne['meteo'] ?></p>
    </div>
    </div>

<?php }} ?>

</div>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        let buttonUnlock = document.querySelector('#unlock');

        buttonUnlock.addEventListener('click', function(e){
            e.preventDefault
            let inputs = document.querySelectorAll('.disable-input')
            Array.from(inputs).forEach(function(input){
                input.disabled = false;
            })
        })
    })
</script>
</html>