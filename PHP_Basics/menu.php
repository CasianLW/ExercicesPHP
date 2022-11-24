



<?php require_once 'fonctionsMenu.php'; 
  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
  $url = "https"; 
else
  $url = "http"; 
  
// Ajoutez // à l'URL.
$url .= "://"; 
  
// Ajoutez l'hôte (nom de domaine, ip) à l'URL.
$url .= $_SERVER['HTTP_HOST']; 
  
// Ajouter l'emplacement de la ressource demandée à l'URL
$url .= $_SERVER['REQUEST_URI']; 

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);

// echo $uri_segments[1]; // for www.example.com/user/account you will get 'user'
    
if($uri_segments[1] === "PHP_Basics"){
    $url1 =  '/PHP_Basics';
}else{
    $url1 =  '/ExercicesPHP/PHP_Basics'; 
}
// Afficher l'URL
// echo $url; 
// var_dump($uri_segments[2]);
?>

<!-- liste url site -->
<?php
// ajouter les url des autres pages ici et utiliser les variable a travers le site pour pouvoir tout modifier a une fois
$urlAccueil = "$url1/index.php";
$urlContact = "$url1/contact.php";
$urlJeu = "$url1/jeu.php";
$urlGlace = "$url1/jeu-post.php";
$urlMenu = "$url1/menu-list.php";
$urlNewsletter = "$url1/newsletter.php";
$urlProfil = "$url1/profil.php";
$urlVerif = "$url1/profil_tableau.php";
$urlDashboard = "$url1/dashboard.php";

$urlLogout = "$url1/logout.php";
$urlLogin = "$url1/login.php";

?>


<?= nav_item("$urlAccueil",'Accueil', $class);?>
<?= nav_item("$urlContact",'Contact', $class);?>
<?= nav_item("$urlJeu",'Jeu GET/POST', $class);?>
<?= nav_item("$urlGlace",'Composer une glace', $class);?>
<?= nav_item("$urlMenu",'Liste Menu', $class);?>
<?= nav_item("$urlNewsletter",'Newsletter', $class);?>
<?= nav_item("$urlProfil",'Profil', $class);?>
<?= nav_item("$urlVerif",'Vérification +18', $class);?>
<?= nav_item("$urlDashboard",'Dashboard', $class);?>





