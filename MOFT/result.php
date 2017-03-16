<?php
  // Démarre la session.
  session_start();
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
      <h1>Manche Open Fortune Telling</h1>
      <h2>Découvre quel métier t'es destiné !</h2>
      <!-- Affichage du résultat -->
      <div id="card" class="MOFT">
        <h3>Ton futur métier sera ...</h3>
        <h4><?php echo $_SESSION['job'].' !'; ?></h4>
        <a class="button" href="index.php" role="button">Réessayer</a>
      </div>
    </div>
  </body>
</html>
