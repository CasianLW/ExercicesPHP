


<main>
  
<?php
 require_once 'functions'.DIRECTORY_SEPARATOR.'compteur-par-jour.php';
 ajouter_vue();
 $vues = nombre_vues();
?>


    <div class="row g-5">
      <div class="col-md-6">
        <br>
        <br>
        <h2>Informations</h2>
        <p>Voir  <a target="_blank" href="https://github.com/CasianLW">mon profil Github</a> pour plus d'informations.</p>
        <ul class="icon-list ps-0">
          <li class="text-muted d-flex align-items-start mb-1">Plus de projets sur mon site:</li>
          <li class="d-flex align-items-start mb-1"><a href="https://casian.fr" rel="noopener" target="_blank">casian.fr</a></li>
        </ul>
      </div>

      <div class="col-md-6">
        <br>
        <br>
        <h2>Menu footer</h2>
        <!-- <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p> -->
        <ul class="icon-list ps-0">
          <?php 
          $class = 'text-decoration-underline';
          require 'menu.php'; ?>
        </ul>
      </div>
    </div>
  </main>
  <footer class="pt-5 my-5 text-muted border-top">
  <p>Il y a <?= $vues ?> visite<?php if($vues > 1): ?>s <?php endif;?> sur le site</p>
    casian.fr &middot; &copy; 2022
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
  </footer>