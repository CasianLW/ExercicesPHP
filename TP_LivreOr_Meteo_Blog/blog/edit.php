<?php 
require_once '../vendor/autoload.php';
// $dotenv = 
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
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

// pdo mysqlite
// $pdo = new PDO('sqlite:../data.db', null, null, [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
// ]);
// $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
$error = null;
$success = null;
// $id = $pdo->quote($_GET['id']);
try{
    if(isset($_POST['name'], $_POST['content'])){
        $query = $pdo->prepare('UPDATE posts SET name = :name, content = :content WHERE id = :id');
        $query->execute([
            'name' => $_POST['name'],
            'content' => $_POST['content'],
            'id' => $_GET['id']
        ]);
        $success = "Votre article a bien été modifié";
    }
    $query = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
    $query->execute([
        'id'=> $_GET['id']
    ]);
    $post = $query->fetch();

}catch(PDOException $e){
    $error = $e->getMessage();
}

require '../elements/header.php'; ?>

<div class="container">
    <p>
        <!-- <a href="/blog">Revenir au listing</a> -->
        <a href="/TP_LivreOr_Meteo_Blog/blog">Revenir au listing</a>
        
    </p>



    <h1>Edit blog articles</h1>
    <?php if($success): ?>
    <div class="alert alert-success"><?=$success?></div>
    <?php endif?>
    <?php if($error): ?>
        <div class="alert alert-danger"><?=$error?></div>

    <?php else: ?>
   
            <!-- <?= var_dump($post) ?> -->
                <form action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="<?=htmlentities($post['name'])?>">
                    </div>
                    <div class="form-group">
                        <textarea type="text" class="form-control" name="content" ><?=htmlentities($post['content'])?></textarea>
                    </div>
                    <button class="btn btn-primary">Sauvegarder</button>
                </form>
            <!-- <?php foreach($posts as $post):?>
            <?php endforeach ?> -->
    
    <?php endif ?>
</div>
<?php require '../elements/footer.php'; ?>