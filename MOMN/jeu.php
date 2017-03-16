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
      <h1>Manche Open Mystery Number</h1>
      <h2>Trouve le nombre mystère !</h2>
      <!-- Affichage du formulaire -->
      <div id="card" class="MOMNGame">
        <h3>Tu as <?php echo $_SESSION['nbVies']; ?> vies.</h3>
        <form action="jeu_post.php" method="post" id="form" name="form">
          <input type="text" name="nb" id="nb" placeholder="Saisis un chiffre entre <?php echo $_SESSION['min'].' et '.$_SESSION['max']; ?>.">
          <p class="warning">
            <?php if(isset($_SESSION['nbMsg'])) echo $_SESSION['nbMsg']; ?>
          </p>
          <button type="submit">Check</button>
          <h4>
            <?php if(isset($_SESSION['gameMsg'])) echo $_SESSION['gameMsg']; ?>
          </h4>
          <?php if(isset($_SESSION['endGame']) && ($_SESSION['endGame'] == true)) echo '<a class="button" href="index.php" role="button">Rejouer</a>'; ?>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
  // Efface les messages d'erreurs de saisie au rafraîchissement de la page.
  $_SESSION['nbMsg'] = '';
?>
