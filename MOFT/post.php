<?php
  // Démarre la session.
  session_start();
  // Si le champ des métiers n'est pas vide,
  if (isset($_POST['jobs']) && !empty($_POST['jobs'])) {
    // sépare les métiers saisis et les insère dans un tableau,
    $jobs = explode(' ', $_POST['jobs']);
    // s'il y a bien eu 3 métiers de saisis,
    if (count($jobs) == 3) {
      array_push($jobs, 'développeur', 'web designer', 'administrateur réseau');  // ajoute les métiers cachés dans le tableau,
      $_SESSION['job'] = $jobs[rand(0, 5)]; // tire au sort le métier dans la tableau,
      header("Location: result.php");    // redirige la page vers la page result.php.
    }
    // S'il n'y a pas eu 3 métiers de saisis,
    else {
      $_SESSION['msg'] = 'Tu dois saisir 3 métiers.';
      header("Location: index.php");    // redirige la page vers la page index.php.
    }
  }
  // Si le champ des métiers est vide,
  else {
    $_SESSION['msg'] = 'Tu dois saisir 3 métiers.';
    header("Location: index.php");    // redirige la page vers la page index.php.
  }
?>
