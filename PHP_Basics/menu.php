



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

echo $uri_segments[1]; // for www.example.com/user/account you will get 'user'
    
if($uri_segments[1] === "PHP_Basics"){
    $url1 =  '/PHP_Basics';
}else{
    $url1 =  '/ExercicesPHP/PHP_Basics'; 
}
// Afficher l'URL
// echo $url; 
// var_dump($uri_segments[2]);
?>
<?= nav_item("$url1/index.php",'Accueil', $class);?>
<?= nav_item("$url1/contact.php",'Contact', $class);?>
<?= nav_item("$url1/jeu.php",'Jeu GET/POST', $class);?>
<?= nav_item("$url1/jeu-post.php",'Composer une glace', $class);?>
<?= nav_item("$url1/menu-list.php",'Liste Menu', $class);?>
<?= nav_item("$url1/newsletter.php",'Newsletter', $class);?>
<?= nav_item("$url1/profil.php",'Profil', $class);?>
<?= nav_item("$url1/profil_tableau.php",'Vérification +18', $class);?>
<?= nav_item("$url1/dashboard.php",'Dashboard', $class);?>





