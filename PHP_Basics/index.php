<?php
session_start();
$_SESSION['role'] = 'administrateur';
// unset pour enlever le role
// unset($_SESSION['role']);
$title = "Page d'accueil";
$nav ='index';
require 'header.php';


// require_once 'functions'.DIRECTORY_SEPARATOR.'compteur-par-jour.php';
// ajouter_vue();
// $vues = nombre_vues();
?>



<div>
      <?php
      // var_dump(  DIRECTORY_SEPARATOR  . 'class' . DIRECTORY_SEPARATOR . 'Compteur.php');
      require_once 'class' . DIRECTORY_SEPARATOR . 'DoubleCompteur.php';
      $compteur = new DoubleCompteur('data' . DIRECTORY_SEPARATOR . 'compteur');
      $compteur ->incrementer();
      $vues = $compteur->recuperer();
      ?>
      <h3>Il y a <?= $vues ?> visites double<?php if($vues > 1): ?>s <?php endif;?> sur le site</h3>
    </div>




  <?php require 'footer.php';
  ?>
</html>
