<?php
  // Démarre la session.
  session_start();
/*
--------------------------------------------------------------------------------
DECLARATION DES FONCTIONS
--------------------------------------------------------------------------------
*/
  // Fonction qui vérifie si les champs du formulaire sont correctement saisis. Elle prend trois variables en paramètres.
  function checkSettings($min, $max, $nbVies) {
    $ok = true;
    $isset = true;
    // Si le champ "minimum" est vide,
    if (!isset($min) || !is_numeric($min)) {
      $_SESSION['minMsg'] = 'Veuillez saisir un chiffre.';  // affiche un message d'erreur,
      $isset = false; // indique que le formulaire n'est pas rempli.
    }
    // Si le champ "maximum" est vide,
    if (!isset($max) || !is_numeric($max)) {
      $_SESSION['maxMsg'] = 'Veuillez saisir un chiffre.';  // affiche un message d'erreur,
      $isset = false; // indique que le formulaire n'est pas rempli.
    }
    // Si le champ "nombre de vies" est vide,
    if (!isset($nbVies) || !is_numeric($nbVies)) {
      $_SESSION['nbViesMsg'] = 'Veuillez saisir un chiffre.'; // affiche un message d'erreur,
      $isset = false; // indique que le formulaire n'est pas rempli.
    }
    // Si les champs sont remplis,
    if ($isset) {
      if ($min < 0) { // si le nombre minimum est négatif,
        $_SESSION['minMsg'] = 'Veuillez saisir un nombre supérieur ou égal à 0.'; // affiche un message d'erreur,
        $ok = false;  // indique que le formulaire n'est pas bien rempli.
      }
      if ($max < 0) { // si le nombre maximum est négatif,
        $_SESSION['maxMsg'] = 'Veuillez saisir un nombre supérieur ou égal à 0.'; // affiche un message d'erreur,
        $ok = false;  // indique que le formulaire n'est pas bien rempli.
      }
      if ($min >= $max) { // si le nombre minimum est plus grand que le nombre maximum,
        $_SESSION['minMsg'] = 'Veuillez saisir un chiffre minimum plus petit que le chiffre maximum.';  // affiche un message d'erreur,
        $_SESSION['maxMsg'] = 'Veuillez saisir un chiffre maximum plus grand que le chiffre minimum.';  // affiche un message d'erreur,
        $ok = false;  // indique que le formulaire n'est pas bien rempli.
      }
      if ($nbVies < 1) {  // si le nombres de vies saisi est inférieur à 1,
        $_SESSION['nbViesMsg'] = 'Veuillez saisir un nombre de vies supérieur à 0.';  // affiche un message d'erreur,
        $ok = false;  // indique que le formulaire n'est pas bien rempli.
      }
    }
    // si les champs ne sont pas remplis,
    else {
      $ok = false;  // indique que le formulaire n'est pas bien rempli.
    }
    return $ok; // Renvoie si le résultat des tests.
  }
/*
--------------------------------------------------------------------------------
PROGRAMME
--------------------------------------------------------------------------------
*/
  //  Si tous les champs sont remplis correctement,
  if (checkSettings($_POST['min'], $_POST['max'], $_POST['nbVies'])) {
    // enregistre les settings en session,
    $_SESSION['min'] = $_POST['min'];
    $_SESSION['max'] = $_POST['max'];
    $_SESSION['nbVies'] = $_POST['nbVies'];
    // initialise le chiffre à deviner,
    $_SESSION['randNb'] = rand($_SESSION['min'], $_SESSION['max']);
    // efface les messages d'erreurs,
    $_SESSION['gameMsg'] = '';
    $_SESSION['minMsg'] = '';
    $_SESSION['maxMsg'] = '';
    $_SESSION['nbViesMsg'] = '';
    $_SESSION['endGame'] = false; // indique que le jeu n'est pas fini,
    header("Location: jeu.php");    // redirige la page vers la page jeu.php.
  }
  // sinon,
  else {
    header("Location: index.php");    // redirige la page vers la page index.php.
  }
?>
