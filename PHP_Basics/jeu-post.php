<?php
$title = "Jeu Post + Glace";

$aDeviner = 150;
$erreur = null;
$succes = null;
$value = null;


if (isset($_POST['chiffre'])){
    if ($_POST['chiffre'] > $aDeviner){
        $erreur = "Votre chiffre est trop grand";
    }elseif ($_POST['chiffre'] < $aDeviner){
        $erreur = "Votre chiffre est trop petit";
    } else {
        $succes = "Bravo! Vous avez deviné <strong>$aDeviner</strong>";
    }
    $value = (int)$_POST['chiffre'];
}
require 'header.php';
?>

<!-- ou bien : -->

<!-- <pre>
    <?php if (isset($_POST['chiffre'])): ?>
        <?php
        if ($_POST['chiffre']>$aDeviner): ?>
            Votre chiffre est trop grand
        <?php elseif ($_POST['chiffre']<$aDeviner):?>
            Votre chiffre est trop petit 
        <?php else:?>
            Bravo! Vous avez deviné le chiffre <?= $aDeviner ?>.
        <?php endif ?>
    <?php endif ?>
</pre> -->


<!--  -->
<!--  -->
<!-- 
<?php if ($erreur):?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
<?php elseif ($succes):?>
<div class="alert alert-success">
    <?= $succes?>
</div>
<?php endif ?>
<h2 class="mb-3">Devinez le nombre</h2>
<form action="/jeu-post.php" method="POST">
    <input 
    class="form-control"
    type="number" 
    name="chiffre" 
    placeholder="entre 0 et 1000" 
    value="<?= $value ?>"
    >
    
    <button class="btn btn-primary mt-4" type="submit">Deviner</button>
</form>
 -->

<!-- php du form checkbox -->
<?php 
// Checkbox
$parfums = [
    'Fraise'=> 4,
    'Vanille' => 5,
    'Chocolat'=>3
];
// Radios
$cornets =[
    'Pot'=> 2,
    'Cornet' => 3
];
// Checkbox
$supplements = [
    'Pépites au chocolat' => 1,
    'Chantilly' => 0.5
];
$title = "Composez votre glace";
$ingredients = [];
$total = 0;


// if (isset($_GET['parfum'])){
//     foreach($_GET['parfum'] as $parfum) {
//         if(isset($parfums[$parfum])){
//             $ingredients[] = $parfum;
//             $total += $parfums[$parfum];
//         }
//     }
// }
// 
// if (isset($_GET['supplement'])){
//     foreach($_GET['supplement'] as $supplement) {
//         if(isset($supplements[$supplement])){
//             $ingredients[] = $supplement;
//             $total += $supplements[$supplement];
//         }
//     }
// }
// 
// if (isset($_GET['cornet'])){
//     $cornet = $_GET['cornet'];
//         if(isset($cornets[$cornet])){
//             $ingredients[] = $cornet;
//             $total += $cornets[$cornet];
//         }
// }

// ou on peut les remplacer par un seul foreach

foreach (['parfum', 'supplement','cornet'] as $name){
    if (isset($_GET[$name])){
        $liste = $name . 's';
        $choix = $_GET[$name];
        if (is_array($choix)){
            foreach($choix as $value) {
                if(isset($$liste[$value])){
                    $ingredients[] = $value;
                    $total += $$liste[$value];
                }
            }
        } else {
            if(isset($$liste[$choix])) {
                $ingredients[] = $choix;
                $total += $$liste[$choix];
            }
        }
        
    }
}


?>

<h2 class="mt-5">Composez votre glace</h2>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Votre glace</h5>
                <ul>
                    <?php foreach($ingredients as $ingredient): ?>
                        <li>
                            <?= $ingredient ?>
                        </li>

                        <?php endforeach; ?>
                </ul>
                <p>
                    <strong>Prix : </strong> <?= $total ?> €
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
      <form action="/jeu-post.php" method="GET">
       <h5 class="">Choisisez vos parfums</h5>
       <?php foreach($parfums as $parfum => $prix):?>
        <div class="checkbox">
            <label class="mt-1">
                <?= checkbox('parfum', $parfum, $_GET) ?>
                <?= $parfum ?> - <?= $prix ?>  €
            </label>
        </div>
        
        <?php endforeach ?>

        <h5 class="">Choisisez votre cornet</h5>
        <?php foreach($cornets as $cornet => $prix):?>
        <div class="radio">
            <label class="mt-1">
                <?= radio('cornet', $cornet, $_GET) ?>
                <?= $cornet ?> - <?= $prix ?>  €
            </label>
        </div>
        
        <?php endforeach ?>

        <h5 class="">Séléctionnez les supplements</h5>

        <?php foreach($supplements as $supplement => $prix):?>
        <div class="checkbox">
            <label class="mt-1">
                <?= checkbox('supplement', $supplement, $_GET) ?>
                <?= $supplement ?> - <?= $prix ?>  €
            </label>
        </div>
        
        <?php endforeach ?>



       <button class="btn btn-primary mt-4" type="submit">Composer ma glace</button>
      </form>
    </div>

</div>

<h2>
    <pre class="mt-5">
        <?php var_dump($_GET) ?>
        <!-- <?php var_dump($_GET) ?> -->

    </pre>
</h2>


<!-- <?php require 'footer.php'; ?> -->

<!-- value="<?php if(isset($_POST['chiffre'])) { echo htmlentities($_POST['chiffre']);}  ?>" -->