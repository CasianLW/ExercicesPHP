
<?php
// if(!function_exists('nav_item')){

// }

function nav_item (string $lien, string $title2, string $linkClasse = ''): string {
    $classe = 'nav-item ';

    if($_SERVER['SCRIPT_NAME'] === $lien){
        $classe = $classe . ' text-white ';
    }
    return '<li class="' . $classe . "text-white" . '"> 
    <a class="nav-link px-3 nav-item text-secondary ' . $linkClasse. ' ' . $classe  . ' " href="' . $lien . '">' . $title2 . ' </a>
    </li>';
    }
?>



<!-- fonctions 'composez votre glace' -->

<?php

function checkbox(string $name, string $value, array $data):string 
{
    $attributes = '';
    if (isset($data[$name]) && in_array($value,$data[$name] ))
    $attributes .= 'checked';
    return <<<HTML
     <input type="checkbox" name="{$name}[]" value="$value" $attributes> 

HTML;
}

function radio(string $name, string $value, array $data):string 
{
    $attributes = '';
    if (isset($data[$name]) && $value == $data[$name] )
    $attributes .= 'checked';
    return <<<HTML
     <input type="radio" name="{$name}" value="$value" $attributes> 

HTML;
}
function dump ($variable) {
    echo '<pre></pre>';
    var_dump($variable);
    echo '</pre>';

}

function creneaux_html (array $creneaux){
    $phrases =  [];
    foreach ($creneaux as $creneau){
        $phrases[] = "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong> ";
    }
    return 'Ouvert ' . implode(' et ', $phrases);
    
}
function creneaux_html2 (array $creneaux2){
    if (count($creneaux2) === 0 ){
        return "<strong>Fermé</strong>";
    }
    $phrases =  [];
    
    foreach ($creneaux2 as $creneau){
        $phrases[] = "<strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong> ";
    }
    return '' . implode(' et ', $phrases);
    
}
function in_creneaux(int $heure, array $creneaux2):bool{
    foreach ($creneaux2 as $creneau){
        $debut = $creneau[0];
        $fin = $creneau[1];
        if ($heure >= $debut && $heure < $fin){
            return true;
        }
    }
    return false;
}

function select (string $name, $value, array $options):string {
    $html_options = [];
    foreach ($options as $k => $option){
        $attributes = $k == $value ? ' selected' : '';
        $html_options[] = "<option value='$k' $attributes >$option</option>";
    }
    return "<select class='form-control' name='$name'>" . implode($html_options) . '</select>';

}
?>