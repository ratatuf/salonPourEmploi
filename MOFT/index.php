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
      <h1>Manche Open Fortune Telling</h1>
      <h2>Découvre quel métier t'es destiné !</h2>
      <!-- Affichage du formulaire -->
      <div id="card" class="MOFT">
        <h3>Settings</h3>
        <form action="post.php" method="post" id="form" name="form">
          <input type="text" name="jobs" id="min" placeholder="Saisis 3 métiers.">
          <p class="warning">
            <?php if(isset($_SESSION['msg'])) echo $_SESSION['msg']; ?>
          </p>
          <button type="submit">Découvrir</button>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
  // Efface le message d'erreur de saisie au rafraîchissement de la page.
  $_SESSION['msg'] = '';
?>
