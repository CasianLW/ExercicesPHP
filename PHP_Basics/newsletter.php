<?php
// require_once 'fonctionsMenu.php';
$title = "Newsletter";
$error = null;
$email = "";
$success = null;
if(!empty($_POST['email'])){
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d');
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $success = "Votre email a bien été enregistré";
        $email = "";
    }else{
        $error = "Email invalide";
    }
}
// var_dump($email);
// var_dump($error);


require 'header.php';
?>
<h1>Newsletter</h1>
<p>*Liste les mails dans des fichiers triées par date (ex: 2022-10-24) dans un dossier 'emails'.</p>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsum voluptatum aliquid ratione saepe natus provident. Expedita, facere! Est alias explicabo praesentium distinctio voluptatem mollitia iste, incidunt ipsa dolores natus minus facilis quas quis recusandae doloremque earum qui modi minima repudiandae vero. A sapiente officia distinctio numquam totam non? Neque, quas?</p>
<?php if($error):?>
    <div class="alert alert-danger">
        <?= $error?>
    </div>
<?php endif;?>
<?php if($success):?>
    <div class="alert alert-success">
        <?= $success?>
    </div>
<?php endif;?>

<form action="/newsletter.php" method="POST" class="form-inline" >
    <div class="form-group">
        <input class="form-control" type="email" name="email" placeholder="Entrez votre email..." required value="<?= htmlentities($email) ?>" >
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </div>
</form>




