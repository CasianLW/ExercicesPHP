<?php
session_start();
$title = "Page de Contact";
$nav ='contact';
require 'header.php';
require_once 'config.php';
require_once 'fonctionsMenu.php';
date_default_timezone_set('Europe/Paris');
$creneaux = creneaux_html(CRENEAUX);
$heure = (int)date('G');
$creneaux2 = CRENEAUX2[date('N') - 1];
$ouvert = in_creneaux($heure, $creneaux2);
$heure_form =(int)($_GET['heure'] ?? date('G'));
$jour_form =(int)($_GET['jour'] ?? date('N') - 1);
$creneau_form = CRENEAUX2[$jour_form];
$ouvert_form = in_creneaux($heure_form, $creneau_form);

// pour definir la couleur

// if ($ouvert){$color = 'green';} else{$color = 'red';};
// ou
$color = $ouvert? 'green' : 'red';


?>
<h2>Debug</h2>
<pre>
    <?= var_dump($_SESSION) ?>
</pre>
<h2>Nous contater</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas eius totam impedit soluta. Repudiandae, aliquid saepe molestias accusamus cumque nemo eveniet at. Suscipit molestiae eos quis eius doloremque aliquid excepturi, id illum porro minima et corrupti similique quam in delectus culpa dolor ea nulla nostrum impedit dignissimos quos unde? Earum  a error facere labore voluptates tempora laboriosam illum doloremque sapiente iure rerum esse ipsum eos aliquam ipsam, consequatur animi magni consectetur non. Fugit maxime molestias id deserunt. Voluptatem animi modi ipsam incidunt obcaecati? Libero porro repellat nulla voluptatem, animi eos!</p>
<h2>Nos horraires:</h2>
<div>
    <?="Date du jour: " . date('l d F Y') ?>
    <?php if($ouvert):?>
    <div class="alert alert-success"> Le magasin est ouvert</div>
    <?php else: ?>
    <div class="alert alert-danger"> Le magasin est fermé</div>
    <?php endif;?>

</div>
<!-- <div class="row"> 
    <form action="" method="GET" class="col-md-4 mb-3">
            <div class="form-group">
                <select name="jour" id="" class="form-control">
                    <?php foreach(JOURS as $k => $jour):?>
                    <option value="<?= $k ?>"><?= $jour ?></option>
                    <?php endforeach ?>
                    
                </select>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="heure" value="<?= $heure ?>">
            </div>
            <button class="btn-primary btn mt-3" type="submit">Voir si le magasin est ouvert</button>
        </form>
        <div class="col-md-4">
        <?php if($ouvert):?>
        <div class="alert alert-success"> Le magasin sera ouvert</div>
        <?php else: ?>
        <div class="alert alert-danger"> Le magasin sera fermé</div>
        <?php endif;?>
        </div>
</div> -->
<div class="row ">
   <div class="col-md-4">
       <?= $creneaux ?>
       <div class="mt-6">
           <ul>
               <?php foreach(JOURS as $k => $jour):?>
               <li <?php if($k + 1 === (int)date('N')):?>
                       style = "color:<?=$color?>" <?php endif ?> >
                   <strong><?= $jour ?> :<br/></strong>
                   <?= creneaux_html2(CRENEAUX2[$k]);?>
               </li>
               <?php endforeach;?>
           </ul>
           <!-- <?= $creneaux2 ?> -->
       </div>
   </div>
   <div class="offset-md-2 col-md-6"> 
    <h3>Un autre jour ?</h3>
    <form action="" method="GET" class="col-md-6 mb-3">
        <label >Jour</label>
            <div class="form-group">
                <?= select('jour', $jour_form, JOURS)  ?>
                <!-- ou -->
                <!-- // <select name="jour" id="" class="form-control">
                // <?php foreach(JOURS as $k => $jour):?>
                // <option value="<?= $k ?>"><?= $jour ?></option>
                // <?php endforeach ?>
                // </select> -->
            </div>
            <div class="form-group">
            <label >Heure</label>
                <input type="number" class="form-control" name="heure" value="<?= $heure_form ?>">
            </div>
            <button class="btn-primary btn mt-3" type="submit">Voir si le magasin est ouvert</button>
        </form>
        <div class="col-md-6">
        <?php if($ouvert_form):?>
        <div class="alert alert-success"> Le magasin sera ouvert</div>
        <?php else: ?>
        <div class="alert alert-danger"> Le magasin sera fermé</div>
        <?php endif;?>
        </div>
</div>
</div>
<?php require 'footer.php';
?>
<!-- php -S localhost:8000  -->