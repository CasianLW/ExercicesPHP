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

require 'Form.php';


// $form = new Form(array(
//     'username' => 'Roger'
// ));
$form = new Form($_POST);
?>

<form action="#" method="POST">
<?php
echo $form->input('username');
echo $form->input('password');
echo $form->submit();
?>
</form>
