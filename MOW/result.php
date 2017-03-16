<?php
/*
--------------------------------------------------------------------------------
DECLARATION DES VARIABLES
--------------------------------------------------------------------------------
*/
  $url = 'http://api.openweathermap.org/data/2.5/weather?id=3014867&units=metric&APPID=418ddcab8737f07770de2914a6e54386'; // URL de l'API Open Weather Map.
  $json=file_get_contents($url);  // Récupère les données de l'API Open Weather Map.
  $data=json_decode($json,true);  // Transforme les données récupérées en tableau.

/*
--------------------------------------------------------------------------------
DECLARATION DES FONCTIONS
--------------------------------------------------------------------------------
*/
  // Fonction qui retourne le temps qu'il fait en fonction de la température. Elle prend une variable en paramètre.
  function temperature($temperature){
    if ($temperature == 0) {
    return 'Cette valeur n\'est pas un chiffre.';
    }
    elseif ($temperature < 0) {
      return 'très froid';
    }
    elseif ($temperature < 11) {
    return 'froid';
    }
    elseif ($temperature < 21) {
      return 'bon';
    }
    elseif ($temperature < 31) {
      return 'chaud';
    }
    else {
      return 'très chaud';
    }
  }
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>MANCHE OPEN SCHOOL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.ico" />
    <!-- Chargement du style -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <!-- Affichage de la barre de navigation -->
    <?php include("../nav.php"); ?>
    <!-- Affichage de la page -->
    <div id="main">
      <h1>Manche Open Weather</h1>
      <h2>Demande la météo d'aujourd'hui !</h2>
      <!-- Affichage du résultat -->
      <div id="card" class="MOW">
        <h3 class="result">Bonjour <?php echo $_POST['prenom']; ?> !</h3>
        <h4 class="result">à Granville, il fait <?php echo temperature($data['main']['temp']);?>.</h4>
        <h5><?php echo 'La temperature est de '.$data['main']['temp'].'°C.';?></h5>
        <a class="button" href="index.php" role="button">Recommencer</a>
      </div>
    </div>
  </body>
</html>
