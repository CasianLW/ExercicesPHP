<?php
$title = "Jeu GET";
$aDeviner = 150;
$erreur = null;
$succes = null;
$erreur2 = null;
$succes2 = null;
$value2 = null;
$value = null;

if (isset($_GET['chiffre'])){
    if ($_GET['chiffre'] > $aDeviner){
        $erreur = "Votre chiffre est trop grand";
    }elseif ($_GET['chiffre'] < $aDeviner){
        $erreur = "Votre chiffre est trop petit";
    } else {
        $succes = "Bravo! Vous avez deviné <strong>$aDeviner</strong>";
    }
    $value = (int)$_GET['chiffre'];
}
require 'header.php';
?>

<!-- ou bien : -->
<h2 class="mb-3">Devinez le nombre (get)</h2>

<!-- <pre>
    <?php if (isset($_GET['chiffre'])): ?>
        <?php
        if ($_GET['chiffre']>$aDeviner): ?>
            Votre chiffre est trop grand
        <?php elseif ($_GET['chiffre']<$aDeviner):?>
            Votre chiffre est trop petit 
        <?php else:?>
            Bravo! Vous avez deviné le chiffre <?= $aDeviner ?>.
        <?php endif ?>
    <?php endif ?>
</pre> -->


<!--  -->
<!--  -->

<?php if ($erreur):?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
<?php elseif ($succes):?>
<div class="alert alert-success">
    <?= $succes?>
</div>
<?php endif ?>

<form action="/jeu.php" method="GET">
    <input 
    class="form-control"
    type="number" 
    name="chiffre" 
    placeholder="entre 0 et 1000" 
    value="<?= $value ?>"
    >
    
    <button class="btn btn-primary mt-4" type="submit">Deviner</button>
</form>
<br>
<br>
<br>
<p>*pour tester le cas success, tapez 150;</p>
<br>
<br>
<br>
<br>
<!-- deviner POST -->
<?php
if (isset($_POST['chiffre'])){
    if ($_POST['chiffre'] > $aDeviner){
        $erreur2 = "Votre chiffre est trop grand";
    }elseif ($_POST['chiffre'] < $aDeviner){
        $erreur2 = "Votre chiffre est trop petit";
    } else {
        $succes2 = "Bravo! Vous avez deviné <strong>$aDeviner</strong>";
    }
    $value2 = (int)$_POST['chiffre'];
}
?>
    <!-- <?php if (isset($_POST['chiffre'])): ?>
        <?php
        if ($_POST['chiffre']>$aDeviner): ?>
            Votre chiffre est trop grand
        <?php elseif ($_POST['chiffre']<$aDeviner):?>
            Votre chiffre est trop petit 
        <?php else:?>
            Bravo! Vous avez deviné le chiffre <?= $aDeviner ?>.
        <?php endif ?>
    <?php endif ?> -->
    
<?php if ($erreur2):?>
    <div class="alert alert-danger">
        <?= $erreur2 ?>
    </div>
<?php elseif ($succes2):?>
<div class="alert alert-success">
    <?= $succes2?>
</div>
<?php endif ?>
<h2 class="mb-3">Devinez le nombre (post)</h2>
<form action="/jeu.php" method="POST">
    <input 
    class="form-control"
    type="number" 
    name="chiffre" 
    placeholder="entre 0 et 1000" 
    value="<?= $value2 ?>"
    >
    
    <button class="btn btn-primary mt-4" type="submit">Deviner</button>
</form>




<!-- <?php require 'footer.php'; ?> -->

<!-- value="<?php if(isset($_GET['chiffre'])) { echo htmlentities($_GET['chiffre']);}  ?>" -->