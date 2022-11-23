<?php
// setcookie('utilisater','John', time()+60*60*24);
$title = "Profil";
$nom = null;

if(!empty($_GET['action']) && $_GET['action'] === 'deconnecter'){
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time()-10);
}

if(!empty($_COOKIE['utilisateur'])){
    $nom = $_COOKIE['utilisateur'];
}
    
if(!empty($_POST['nom'])){
setcookie('utilisater',$_POST['nom']);
$nom = $_POST['nom'];
}

require 'header.php';
// var_dump($_COOKIE);
?>
<h1>Profil</h1>
<?php if($nom): ?>

<h2>Bonjour <u><?= htmlentities($nom) ?></u> </h2>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum voluptatum aliquid ratione saepe natus provident. Expedita, facere! Est alias explicabo praesentium distinctio voluptatem mollitia iste, incidunt ipsa dolores natus minus facilis quas quis recusandae doloremque earum qui modi minima repudiandae vero. A sapiente officia distinctio numquam totam non? Neque, quas?</p>
<h3>Voulez vous vous deconnecter?</h3>
<a href="profil.php?action=deconnecter">Se déconnecter</a>
<?php else: ?>



<form action="" method="POST">
    <div class="form-group">
        <input class="form-control" name="nom" placeholder="Entrer votre nom">
    </div>
    <button class="btn btn-primary">Se connecter</button>
</form>

<?php endif; ?>



