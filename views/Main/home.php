<?php

if (isset($data["controller"])) {
    $cont = $data["cont"];
    $root = get("/Dashboard", "menu");
   
}

?>

<?php if ($mobile) { ?>
<main>
    <section class="container">
        <a href="<?php echo $root; ?>" class="ma--btn">JOIN</a>
        <article>
            <img class="hero-image" src="resources/img/jb7dunk-780px.jpg" alt="hero-image" srcset="">
        </article>
    </section>
</main>


<?php } else { ?>
<main>
    <section class="ma--container">
        <a href="<?php echo $root; ?>" class="ma--btn">JOIN</a>
        <article class="hero-image"><img src="resources/img/background-1920x1080.jpg" alt="hero-image" srcset="">
        </article>
    </section>
</main>
<?php } ?>

