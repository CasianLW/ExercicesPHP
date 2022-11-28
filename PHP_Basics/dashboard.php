<?php 
// session_start();
// $_SESSION['connecte'] = 1;
// unset($_SESSION['connecte']);
require_once 'functions/auth.php';
require_once 'menu.php';


if(!est_connecte()){
    header("Location: $urlLogin");
    exit();
}
// var_dump(est_connecte());
// exit();


require_once 'header.php';
require 'functions/compteur-par-jour.php';
$annee = (int)date('Y');
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : $_GET['mois'];
if($annee_selection && $mois_selection){
    $total = nombre_vues_mois($annee_selection, $mois_selection);
    $detail = nombre_vues_detail_mois($annee_selection, $mois_selection);

}else{
    $total = nombre_vues();

}
// var_dump('Test PHP des vues trouvées dans le mois sélectionnée: ' . $detail);
$mois = [
    '01' => 'Janvier',
    '02' => 'Fevrier',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Decembre',
];


?>

*Voir tableau: 2022 -> Novembre |ou| 2018 -> Fevrier
<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for ($i=0; $i < 5; $i++):?>
            <a href="<?=$urlDashboard?>?annee=<?=$annee - $i?>" class="list-group-item text-decoration-underline <?= $annee - $i === $annee_selection ? 'active':'';?> "><?=$annee - $i?></a>
            <?php if($annee - $i === $annee_selection):?>
                <div class="list-group">
                <?php foreach($mois as $numero => $nom): ?>
                    <!-- <?= var_dump($mois_selection); ?> -->
                    
                    <a href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $numero ?>" class="list-group-item <?= intval($numero) === intval($mois_selection) ? ' active ' : '' ?>" style="width:80%;">>
                    <!-- <?= var_dump(intval($numero) === intval($mois_selection)); ?> -->
                        <?=$nom?>
                    </a>
                <?php endforeach;?>

                </div>
            <?php endif; ?>
            <?php endfor; ?>

        </div>

    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <strong style="font-size:3em;"><?=$total?></strong>
                Visite<?= $total > 1 ? 's' : '' ?> <br>total
            </div>
        </div>
        <?php if(isset($detail)):?>
            <h2>Détail des visites pour le mois</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <!-- <th>Annee</th>
                        <th>Mois</th> -->
                        <th>Jour</th>
                        <th>Nombre de visites</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($detail as $ligne):?>
                    <tr>
                        <!-- <td><?=$ligne['annee']?></td>
                        <td><?=$ligne['mois']?></td> -->
                        <td><?=$ligne['jours']?></td>
                        <td><?=$ligne['visites']?> visite<?=$ligne['visites'] > 1 ? 's' : ''?></td>
                    </tr>
                    <?php endforeach;?>

                </tbody>

            </table>
        <?php endif;?>
    </div>
</div>


<?php require 'footer.php';?>