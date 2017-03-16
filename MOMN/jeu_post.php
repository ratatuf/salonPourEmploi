<?php
  // Démarre la session.
  session_start();
  // Si le chiffre est correctement saisi,
  if (isset($_POST['nb']) && is_numeric($_POST['nb'])) {
    if($_SESSION['endGame'] == false){  // si le jeu n'est pas fini,
      if ($_POST['nb'] < $_SESSION['min'] || $_POST['nb'] > $_SESSION['max']) { // et si le chiffre saisi n'est pas compris entre le minimum et le maximum déterminés,
        $_SESSION['nbMsg'] = 'Saisis un chiffre entre '.$_SESSION['min'].' et '.$_SESSION['max'].'.'; // affiche un message d'erreur.
      }
      // Sinon, s'il ne reste plus qu'une vie et que le chiffre n'est pas trouvé,
      elseif ($_SESSION['nbVies'] == 1 && $_POST['nb'] != $_SESSION['randNb']) {
        $_SESSION['nbVies']--;  // enlève une vie,
        $_SESSION['endGame'] = true;  // indique que le jeu est fini,
        $_SESSION['gameMsg'] = 'Tu as perdu. Le chiffre est '.$_SESSION['randNb'].'.';  // affiche un message de fin,
        $_SESSION['nbMsg'] = '';  // efface les erreurs de saisie.
      }
      // Sinon, s'il ne reste plus de vie,
      elseif ($_SESSION['nbVies'] < 1) {
        $_SESSION['gameMsg'] = 'Tu as perdu. Le chiffre est '.$_SESSION['randNb'].'.';  // affiche la fin du jeu,
        $_SESSION['nbMsg'] = '';  // efface les erreurs de saisie.
      }
      // Sinon, si le chiffre saisi est plus petit que le chiffre à deviner,
      elseif ($_POST['nb'] < $_SESSION['randNb']) {
        $_SESSION['nbVies']--;  // enlève une vie,
        $_SESSION['gameMsg'] = 'Le chiffre est plus grand.';  // affiche une indication,
        $_SESSION['nbMsg'] = '';  // efface les erreurs de saisie.
      }
      // Sinon, si le chiffre saisi est plus grand que le chiffre à deviner,
      elseif ($_POST['nb'] > $_SESSION['randNb']) {
        $_SESSION['nbVies']--;  // enlève une vie,
        $_SESSION['gameMsg'] = 'Le chiffre est plus petit.';  // affiche une indication,
        $_SESSION['nbMsg'] = '';  // efface les erreurs de saisie.
      }
      // Si le chiffre a été trouvé,
      else {
        $_SESSION['endGame'] = true;  // indique la fin du jeu,
        $_SESSION['gameMsg'] = 'Bravo ! Tu as trouvé. Le chiffre est '.$_SESSION['randNb'].'.'; // affiche un message de fin,
        $_SESSION['nbMsg'] = '';  // efface les erreurs de saisie.
      }
    }
  }
  // Si le chiffre n'est pas correctement saisi,
  elseif ($_SESSION['endGame'] == false) {  // et si le jeu n'est pas fini,
    $_SESSION['nbMsg'] = 'Saisis un chiffre entre 0 et 10.';  // affiche un message d'erreur.
  }

  header("Location: jeu.php");    // Redirige la page vers la page jeu.php.
?>
