<?php
// exercice getters / setters
// require 'Personnage.php';

// $merlin = new Personnage("Merlin");
// $merlin->regenerer(5);
// // $merlin->nom = "Merlin";

// $harry = new Personnage("Harry");

// $merlin->getNom();

// $harry->getVie();

// $harry->regenerer(15);

// var_dump($merlin->getVie());
// var_dump($harry->getVie());
// var_dump('<br><br><br><br><br>');

// $merlin->attaque($harry);
// var_dump($harry->getVie());
// if($harry->mort()){
//     echo 'Harry est mort';
// }else {
//     echo 'Harry a survecu avec '. $harry->getVie();
// }

// // getters
// var_dump($merlin->getNom());

// autoloader
require 'class/Autoloader.php';
\Tutoriel\Autoloader::register();

// require_once 'Form.php';
// require_once 'text.php';
// require_once 'Personnage.php';

$merlin = new Personnage("Merlin");
$merlin -> regenerer();

var_dump($merlin);

// $form = new Form(array(
//     'username' => 'Roger'
// ));
$form = new Form($_POST);
var_dump(Text::publicwithZero(14));

?>

<form action="#" method="POST">
<?php
echo $form->input('username');
echo $form->input('password');
echo $form->submit();
?>
</form>
