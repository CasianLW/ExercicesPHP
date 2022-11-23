<?php
// declare(strict_types=1);

// use App\OpenWeather;


use App\OpenWeather as AppOpenWeather;

require_once 'vendor/autoload.php';
// $weather = new OpenWeather('41c935ead9356a3c9346370423096c14');
$weather = new AppOpenWeather('94c6cf0868fa5cb930a5e2d71baf0dbf');
$error = null;

$mainTitle = "Paris,fr";

function runMyFunction() {
    unset($_COOKIE['birthday']);
  //   unset($_COOKIE['PHPSESSID']);
    header('Clear-Site-Data: "cache", "cookies", "storage", "executionContexts"');
    header("Refresh:0; url=http://localhost:3008/profil_tableau.php");
    // setcookie("birthday","",time()-3600);
  
  }
  
  if (isset($_GET['action'])) {
    runMyFunction();
  }


try{
    // $data = explode(' ');
    $forecast = $weather->getForecast('Paris,fr');
    // var_dump($forecast);
    $today = $weather->getToday('Paris,fr');
}catch (Exception $e) {
    $error = $e->getMessage();
} catch (Error $e){
    $error = $e->getMessage();
}
?>
<?php require 'elements/header.php';?>

<?php if($error):?>
<div class="alert alert-danger"><?=$error?></div>
<?php else:?>


<div class="container">
    <br>
    <br>
    <h1>Météo du jour pour <?= $mainTitle?></h1>
    <ul>
        <li>En ce moment <?= $today['date']->format('d/m/Y')?>: <?= $today['description'] ?> <?= $today['temp'] ?> degrées</li>

        <?php foreach($forecast as $day):?>
        <li><?= $day['date']->format('d/m/Y')?> <?= $day['description'] ?> <?= $day['temp'] ?> degrées</li>
        <?php endforeach?>
    </ul>

</div>
<?php endif; ?>

<?php require 'elements/footer.php';?>
<!-- use App\OpenWeather; -->
