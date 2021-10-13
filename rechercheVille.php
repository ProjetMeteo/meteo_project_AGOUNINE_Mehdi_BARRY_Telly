<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="index.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<body>
<form action="" method="GET">
    <label for="name"><h1>Veuillez entrer une ville :</h1></label><br>
    <div class= champ><input type="text" id="name" name="ville" ><br></div>
    <div class=boutton > <input type="submit" value="Envoyer" class="btn btn-lg btn-primary"><br> </div>
</form>

    <?php
    
        //appel de l'API
        if (isset($_GET['ville']))
            {
                $ville = $_GET['ville'];
            }
        else
            {
                $ville = "Paris";
            }    
            $curl = curl_init("https://api.openweathermap.org/data/2.5/weather?appid=fc383ec81d9c86f4fca37b87747e5dcc&lang=fr&units=metric&q=".$ville);

            //contourner certif
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);


        $data = curl_exec($curl);
        $data = json_decode($data, true);
        var_dump($data['cod']);
        
        if (isset($_GET['ville']))
        {
            if ($data['cod'] != 200)
                {
                    echo("error");
                }
            else    
                {       
                    $return=("Le temps est ".$data['weather'][0]['description']." et il fait ".$data['main']['temp']." Ã  ".$data['name']);
                    echo($return);
                }
        }
        curl_close($curl);
    ?>

</body>
</html>