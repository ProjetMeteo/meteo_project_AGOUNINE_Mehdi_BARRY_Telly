<?php

function addUser($mail, $mdp, $nom, $prenom){
        
        $connexion = new PDO('mysql:host=localhost;dbname=meteo','root',''); // connexion a la bdd
        
        $req_pre = $connexion->prepare("INSERT INTO utilisateur (mail, mdp, nom ,prenom) VALUES (?,?,?,?)"); // préparation de la requete
        
        $req_pre->execute([$mail,$mdp,$nom,$prenom]); // execution de la requete
}

function updateUser($idUser,$mail, $mdp, $nom, $prenom){

        $connexion = new PDO('mysql:host=localhost;dbname=meteo','root','');

        $req_pre = $connexion->prepare("UPDATE utilisateur SET mail = ?, mdp = ?, nom = ?, prenom = ? WHERE id = '$idUser'");

        $req_pre->execute([$mail,$mdp,$nom,$prenom]);
}

function findUser($idUser){

        $connexion = new PDO('mysql:host=localhost;dbname=meteo','root','');

        $stmt = $connexion->query("SELECT * FROM utilisateur WHERE id = '$idUser'");

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data;
}

function checkCredentials($mail, $mdp){

        $connexion = new PDO('mysql:host=localhost;dbname=meteo','root','');

        $stmt = $connexion->query("SELECT id,mail,mdp FROM utilisateur WHERE mail = '$mail'");

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        if($data){ // SI EMAIL EST EN BASE DE DONNEES
                $mailBDD = $data['mail'];
                $mdpBDD = $data['mdp'];
                $idUser = $data['id'];

                echo 'FELICITATION le mail existe en bdd ! </br>';

                if($mdp === $mdpBDD){
                        
                        $_SESSION['user'] = $idUser;
                        header('location:index.php');

                }else{
                        echo "DOMMAGE le mot de passe n'est pas le bon ! </br>";
                }


        }else{
                echo " DOMMAGE le mail n'existe pas en bdd </br>";
        }
        

}

function findVille($ville){
    
            $curl = curl_init("https://api.openweathermap.org/data/2.5/weather?appid=fc383ec81d9c86f4fca37b87747e5dcc&lang=fr&units=metric&q=".$ville);

            //contourner certif
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);


        $data = curl_exec($curl);
        $data = json_decode($data, true);
        
        
        if ($data['cod'] != 200)
        {
                echo("error");
        }
        else    
        {       
                $description = $data['weather'][0]['description'];
                $temperature = (int) $data['main']['temp'];
                $name = $data['name'];
                $icon = $data['weather'][0]['icon'];

                if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                        addHistory($name, $temperature, $description);
                }

                return [
                        'description' => $description,
                        'temperature' => $temperature,
                        'name' => $name,
                        'icon' => $icon
                ];
        }
        curl_close($curl);
        
}

function addHistory($ville, $temperature, $description){

        $connexion = new PDO('mysql:host=localhost;dbname=meteo','root',''); // connexion a la bdd
        
        $req_pre = $connexion->prepare("INSERT INTO historique (creation, villeName, temperature ,meteo, idUtilisateur) VALUES (?,?,?,?,?)"); // préparation de la requete
        
        $idUtilisateur = $_SESSION['user'];
        $creation = date('Y-m-d H:i:s');

        $req_pre->execute([$creation,$ville,$temperature, $description, $idUtilisateur]); // execution de la requete

        $req_pre->errorInfo();
}

function findHistory($idUser){

        $connexion = new PDO('mysql:host=localhost;dbname=meteo','root','');

        $stmt = $connexion->query("SELECT * FROM historique WHERE idUtilisateur = '$idUser' ORDER BY creation DESC");

        $data = $stmt->fetchAll();

        return $data;

}

function addFavorite($idUser,$ville){
        $connexion = new PDO('mysql:host=localhost;dbname=meteo','root','');
        $req_pre = $connexion->prepare("INSERT INTO ville_favorite (nom) VALUES (?)");
        $req_pre->execute([$ville]);

        $lastId = $connexion->lastInsertId();
        $req_pre2 = $connexion->prepare("INSERT INTO ajoute (id,id_1) VALUES (?,?)");
        $req_pre2->execute([$idUser, $lastId]);
}

function findFavorite($idUser){
        $connexion = new PDO('mysql:host=localhost;dbname=meteo','root','');
        $stmt = $connexion->query("SELECT ville_favorite.Nom FROM utilisateur,ajoute,ville_favorite WHERE utilisateur.id = ajoute.id AND ville_favorite.id = ajoute.id_1 AND utilisateur.id = $idUser");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
}       
?>
