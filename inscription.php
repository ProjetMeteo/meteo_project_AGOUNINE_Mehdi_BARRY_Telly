<?php require 'header.php' ?>

<?php 

if (isset($_POST['submit'])){
    if (!isset($_POST['nom']) | empty($_POST['nom']) | !isset($_POST['prenom']) | empty($_POST['prenom']) | !isset($_POST['mail']) | empty($_POST['mail']) | !isset($_POST['mdp']) | empty($_POST['mdp'])){
        echo 'UN CHAMP EST VIDE !';
    }else{
        // ENREGISTREMENT DES DONNEES EN BDD ICI
        require 'utils.php';
        addUser($_POST['mail'],$_POST['mdp'],$_POST['nom'],$_POST['prenom']);
        header('location:connexion.php');
    }
}



?>


<form action="" method="POST">
    <label class="form-label" for="nom">Nom : </label>
    <input class="form-control" type="text" name="nom">
    </br>

    <label class="form-label" for="prenom">Prenom : </label>
    <input class="form-control" type="text" name="prenom">
    </br>

    <label class="form-label" for="mail">Email : </label>
    <input class="form-control"t type="text" name="mail">
    </br>

    <label class="form-label" for="mdp">Mot de Passe : </label>
    <input class="form-control" type="text" name="mdp">
    </br>

    <input class="btn btn-primary" type="submit" name ="submit" value="s'inscrire">
</form>
    
</body>
</html>