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
      <!-- Affichage du formulaire -->
      <div id="card" class="MOW">
        <h3>Settings</h3>
        <form action="result.php" method="post" id="form" name="form">
          <input type="text" name="prenom" id="min" placeholder="Prénom">
          <button type="submit">Voir la météo</button>
        </form>
      </div>
    </div>
  </body>
</html>
