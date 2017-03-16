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
    <link rel="icon" href="../images/favicon.ico" />
    <!-- Chargement du style -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <!-- Affichage de la barre de navigation -->
    <?php include("../nav.php"); ?>
    <!-- Affichage de la page -->
    <div id="main">
      <h1>Manche Open Mystery Number</h1>
      <h2>Trouve le nombre mystère !</h2>
      <!-- Affichage du formulaire -->
      <div id="card" class="MOMN">
        <h3>Settings</h3>
        <form action="settings.php" method="post" id="form" name="form">
          <input type="text" name="min" id="min" placeholder="Minimum">
          <p class="warning">
            <?php if(isset($_SESSION['minMsg'])) echo $_SESSION['minMsg']; ?>
          </p>
          <input type="text" name="max" id="max" placeholder="Maximum">
          <p class="warning">
            <?php if(isset($_SESSION['maxMsg'])) echo $_SESSION['maxMsg']; ?>
          </p>
          <input type="text" name="nbVies" id="nbVies" placeholder="Nombre de vies">
          <p class="warning">
            <?php if(isset($_SESSION['nbViesMsg'])) echo $_SESSION['nbViesMsg']; ?>
          </p>
          <button type="submit">Jouer</button>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
  // Efface les messages d'erreurs de saisie au rafraîchissement de la page.
  $_SESSION['minMsg'] = '';
  $_SESSION['maxMsg'] = '';
  $_SESSION['nbViesMsg'] = '';
?>
