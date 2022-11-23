<?php
$erreur = null;
$password = password_hash('Doe', PASSWORD_DEFAULT, ['cost' => 12]);
//  ou
// $password = $2y$12$/xWFIJG3tw0ix89Agk/aTuZrVhEmJrygsoaV8OIJIktI2YF.v9c1m
if(!empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){
    // if ($_POST['pseudo'] == 'John' && $_POST['motdepasse'] === 'Doe'){
    if ($_POST['pseudo'] == 'John' && password_verify($_POST['motdepasse'], $password)){
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /dashboard.php');
        exit();
    } else {
        $erreur = 'Identfiants incorrects';
    } 
}

require_once 'functions/auth.php';
if (est_connecte()){
    header('Location: /dashboad.php');
    exit();
}
require_once 'header.php';
?>

<?php if($erreur): ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>

<?php endif; ?>
<h1>Connectez-vous</h1>
<br>
*usr: John //pwd: Doe
<br>
<form action="" method="post">
    <div class="form-group">
        <input class="form-control" type="text" name="pseudo" placeholder="Nom d'utilisateur">
    </div>
    <div class="form-group">
        <input class="form-control" type="password" name="motdepasse" placeholder="Votre mot de passe">
    </div>
    <button class="btn btn-primary" type="submit">Se connecter</button>
</form>

<?php require 'footer.php'; ?>