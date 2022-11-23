<?php 
$date1 = '2017-01-01';
$date2 = '2019-04-01';
$d1 = new DateTime($date1);
$d2 = new DateTime($date2);
$diff = $d1->diff($d2, true);
var_dump($diff);
echo "Il y a {$diff->y} années, {$diff->m} et {$diff->j} de difference";

// 

$days1 = $d1->diff($d2, true)->days1;
echo "Il y a {$days1} jours de différence";
$date = new DateTime();
$date ->modify ('+1 month');
var_dump($date);
echo $date -> format('d/m/Y');
// 

echo "\n";
$time1 = strtotime($date1);
$time2 = strtotime($date2);
$days = floor(abs($time1 - $time2) / (24*60*60));
echo "Il y a $days jours de difference";
$time = time();
$time = strtotime('+1 month',$time);
echo date('d/mY',$time);

// 

$date3 = new DateTime('2019-01-01');
$interval = new DateInterval('P1M1DT1M');
$date3 ->add($interval);
var_dump($date3);


// creneaux class
var_dump('<br>');
var_dump('<br>');

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Creneau.php';
$creneau = new Creneau(9,12);
// $creneau ->debut = 9;
// $creneau ->fin = 12;
$creneau2 = new Creneau(14,16);

var_dump($creneau->intersect($creneau2));
// var_dump($creneau, $creneau2);
// var_dump($creneau->inclusHeure(10),$creneau2->inclusHeure(10));
var_dump('<br>');
echo $creneau->toHTML();


// class statique form 
// pas besoin d'instancier
var_dump('<br>');
var_dump('<br>');

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Form.php';
echo Form::checkbox('demo','Demo',[]);

// variable publique dans class
echo Form::$class;

