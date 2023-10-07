<style>
    * {color:black;}
    h1 {color:red;}
    p {font-style:italic;}
    img {border-radius:10px; width:50px; height: 50px;}
</style>    
<article>
<h1><?= $titre ; ?></h1>
<p>
<?= $corps ; ?>
</p>
<img src="<?php echo $illustration ; ?>">
</article>

<a href="/miniMVC2">revenir</a>