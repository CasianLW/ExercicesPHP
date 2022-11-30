<?php

$post = $db->prepare('SELECT * FROM articles WHERE id = ?', [$_GET['id']], 'App\Table\Article', true );

?>
<p><a href="index.php?p=home">Home</a></p>

    <h1><?= $post->titre; ?></h1>
    <p><?= $post->contenu; ?></p>
