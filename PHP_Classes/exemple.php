<?php
namespace Tutoriel;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP POO</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>




<?php
// autoload
// autoloader
use \Tutoriel\HTML\BootstrapForm;
use \Tutoriel\Autoloader;
require 'class/Autoloader.php';
Autoloader::register();

// require_once 'form.php';
// require_once 'BootstrapForm.php';
// require_once 'Personnage.php';
// require_once 'Archer.php';


$merlin = new Personnage('Merlin');
$harry = new Personnage('Harry');

$legolas = new Archer('Legolas');

$legolas->attaque($harry);
var_dump($merlin,$harry,$legolas);

$form = new BootstrapForm($_POST);

?>
<br>
<br>
<br>
<form action="#" method="POST">
<?php
echo $form->input('username');
echo $form->input('password');
// echo $form->date();
echo $form->submit();
?>
</form>


    
</body>
</html>