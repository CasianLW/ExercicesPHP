<?php
require_once '../vendor/autoload.php';

use Dotenv\Dotenv;

// $dotenv = 
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();
// $_ENV['S3_BUCKET'];
use dump;
use App\Post;
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
$lienWebsite= $_SERVER['REQUEST_URI'];

// $pdo->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
$error = null;
try{
    if(isset($_POST['name'], $_POST['content'])){
        $query = $pdo->prepare('INSERT INTO posts (name, content, created_at) VALUES (:name, :content, :created)');
        $query->execute([
            'name' => $_POST['name'],
            'content' => $_POST['content'],
            'created' => time()
        ]);
        // $success = "Votre article a bien été modifié";
        header('Location: /TP_LivreOr_Meteo_Blog/blog/edit.php?id=' . $pdo->lastInsertId());
        exit();
    }
    $query = $pdo->query('SELECT * FROM posts');
    $posts = $query->fetchAll(PDO::FETCH_CLASS,Post::class);
    // var_dump($posts);
    // $posts = $query->fetchAll(PDO::FETCH_OBJ);
}catch(PDOException $e){
    // var_dump($pdo->errorInfo());
    // die('Erreur SQL');
    $error = $e->getMessage();
}

// echo '<pre>';
// print_r($posts);
// echo '</pre>';
require '../elements/header.php'; ?>
<div class="container">
    <h1>Gestion du blog</h1>
    <br>
        <h2>Créer un nouveau article:</h2>

    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" value="">
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="content" ></textarea>
                        </div>
                        <button class="btn btn-primary">Ajouter un article</button>
                    </form>
                    <!-- <?=htmlentities($post->name)?> -->
                    <br>
                    <br>
    <h2>Articles du blog:</h2>
    <?php if($error): ?>
        <div class="alert alert-danger"><?=$error?></div>
    <?php else:?>
    <ul>
            <?php foreach($posts as $post):?>
                <!-- <?php dump($post); ?> -->
                <!-- <h2><a href="/blog/edit.php?id=<?=htmlentities($post->id)?>"><?= htmlentities($post->name) ?></a></h2> -->
                <h2><a href="/TP_LivreOr_Meteo_Blog/blog/edit.php?id=<?=htmlentities($post->id)?>"><?= htmlentities($post->name) ?></a></h2>
                <p class="small text-muted">Ecrit le <?= $post->created_at->format('d/m/Y à H:i') ?></p>
                <!--  -->
                <p><?= $post->getBody()?></p>
                <!--  -->
                <!-- <p><?= nl2br(htmlentities($post->getExcerpt()))?></p> -->

            <?php endforeach ?>
    </ul>

    <?php endif ?>
</div>
<?php require '../elements/footer.php'; ?>