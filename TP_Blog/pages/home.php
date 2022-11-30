

<h1>Hello, world! Je suis la HP</h1>
    <p><a href="index.php?p=single">Single</a></p>

<ul>
<?php foreach($db->query('SELECT * FROM articles', 'App\Table\Article') as $post): ?>
    <!-- <?php var_dump($post)?> -->
<h2><a href="<?= $post->url;?>"><?= $post->titre;?></a></h2>
<p><?= $post->extrait;?></p>
<?php endforeach;?>
</ul>
