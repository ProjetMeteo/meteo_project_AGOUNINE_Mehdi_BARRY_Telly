<?php require 'header.php' ?>

<?php 
if (isset($_POST['submit'])){
    if (!isset($_POST['mail']) | empty($_POST['mail']) | !isset($_POST['mdp']) | empty($_POST['mdp'])){
        echo 'UN CHAMP EST VIDE !';
    }else{
        require 'utils.php';
        checkCredentials($_POST['mail'],$_POST['mdp']);
    }
}
?>

<form action="" method="POST">
    <label class="form-label" for="mail">Email : </label>
    <input class="form-control"t type="text" name="mail">
    </br>

    <label class="form-label" for="mdp">Mot de Passe : </label>
    <input class="form-control" type="text" name="mdp">
    </br>

    <input class="btn btn-primary" type="submit" name ="submit" value="connexion">
</form>
    
</body>
</html>