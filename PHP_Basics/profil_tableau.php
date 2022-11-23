<?php
// setcookie('utilisater','John', time()+60*60*24);
$title = "Page en fonction de l'age";


$age = null;
if(!empty($_POST['birthday'])){
    setcookie('birthday',$_POST['birthday']);
    $_COOKIE['birthday'] = $_POST['birthday'];
}
if(!empty($_COOKIE['birthday'])){
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}



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


// var_dump(unserialize($utilisateur));

require 'header.php';
?>

<?php if($age >= 18): ?>
    <h1>Du contenu réservé aux adultes</h1>



    <a href="profil_tableau.php?action=true">Reseter les cookies</a>

 <?php elseif($age !== null):?>
    <div class="alert alert-danger">Vous n'avez pas l'age requis pour voir le contenu</div>
    <a href="profil_tableau.php?action=true">Reseter les cookies</a>

    
<?php else: ?>

<form action="" method="POST">
    <div class="form-group">
        <label for="birthday">Section réservée pour les adultes, entrer votre date de naissance :</label>
        <select name="birthday" class="form-control">
            <?php for($i=2010; $i> 1919; $i--):?>
                <option value="<?=$i?>"><?=$i?></option>
            <?php endfor ?>
        </select>

    </div>
    <button class="btn btn-primary" type="submit">Envoyer</button>
</form>

<?php endif; ?>






