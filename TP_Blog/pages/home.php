<?php
require_once '../vendor/autoload.php';

use Dotenv\Dotenv;
// var_dump(dirname(__DIR__.'../'));
$dotenv = Dotenv::createImmutable(dirname(__DIR__.'../'));
$dotenv->load();
// $_ENV['S3_BUCKET'];
// pdo classique aws
$hostname = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASSWORD'];
$port = $_ENV['DB_PORT'];
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$dbname;port=$port", $user, $pass);
    // foreach($pdo->query('SELECT * from FOO') as $row) {
    //     print_r($row);
    // }
    // $pdo = null;
    // var_dump("ca fonctionne" . $dbname);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $count = $pdo->exec('INSERT INTO articles SET titre="Mon titre", date=" '. date('Y-m-d H:i:s'). '"');
// var_dump($count);
$res = $pdo->query('SELECT * FROM articles');
$data = $res->fetchAll(PDO::FETCH_OBJ);
var_dump($data[0]->titre);

?>

    <h1>Hello, world! Je suis la HP</h1>
    <p><a href="index.php?p=single">Single</a></p>
