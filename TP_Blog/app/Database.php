<?php
namespace App;

require_once '../vendor/autoload.php';

use PDO;
use PDOException;
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


class Database {
// var_dump(dirname(__DIR__.'../'));
    // private $dotenv = Dotenv::createImmutable(dirname(__DIR__.'../'));
    // private $dotenv->load();
    private $hostname ;
    private $dbname ;
    private $user ;
    private $pass ;
    private $port ;
    private $pdo;
    
    public function __construct($dbname,$user = "admin", $pass="DBsandbox4747", $hostname = "sandbox-db.cik4gyxk4i2r.us-east-1.rds.amazonaws.com", $port = "3306" )
    {
        $this->dbname=$dbname;
        $this->user=$user;
        $this->pass=$pass;
        $this->hostname=$hostname;
        $this->port=$port;
        
        
    }
    private function getPDO(){

        if($this->pdo === null){

            try {
                $pdo = new PDO("mysql:host=$this->hostname;dbname=$this->dbname;port=$this->port", $this->user, $this->pass);
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
                
                $this->pdo = $pdo;
            }
        return $this->pdo;
    }
    public function query($statement, $class_name){
        $req = $this->getPDO()->query($statement);
        $datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
        return $datas;
    }
    public function prepare($statement, $attributes, $class_name, $one =false){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one){
            $datas = $req->fetch();
        }else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }
}
?>

<!-- require_once '../vendor/autoload.php';

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


// $count = $pdo->exec('INSERT INTO articles SET titre="Mon titre", date=" '. date('Y-m-d H:i:s'). '"');
// var_dump($count);
$res = $pdo->query('SELECT * FROM articles');
$data = $res->fetchAll(PDO::FETCH_OBJ);
var_dump($data[0]->titre); -->
