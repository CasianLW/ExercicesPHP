<?php
$title = "Menu restaurant";
require_once 'fonctionsMenu.php';

$title = 'Notre menu';
$lignes = file(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'menu.tsv');
// $lignes2 = explode(PHP_EOL, $lignes);
foreach ($lignes as $k => $ligne){
    // pour .tsv
    $lignes[$k] = explode("\t", trim($ligne)); 
    // ou
    // pour .csv
    // $lignes[$k] = str_getcsv(trim($ligne, " \t\n\r\0\x0B," ));
}

// dump($lignes);


require 'header.php';
?>
<h1>Menu</h1>
<p>*Generé à partir d'un fichier .csv ou .tsv </p>

<?php foreach($lignes as $ligne):?>
    <?php if(count($ligne)=== 1):?>
        <h2><?= $ligne[0] ?></h2>
        <?php else: ?>
            <div class="row">
                    <div class="col-sm-8">
                    <p>
                    <strong><?= $ligne[0];?></strong> <br>
                    <?= $ligne[1]; ?>
                     </p>
                    </div>
                    <div class="col-sm-4">
                    <strong><?= number_format($ligne[2], 2,','); ?> €</strong>

                    </div>
            </div>
        <?php endif;?>
        <?php endforeach;?>


