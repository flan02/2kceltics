<?php
    
  if(isset($data["articles"])){

    $articles = $data["articles"]; 
    $unix = $data["unix"];
    $jpg = ".jpg";
    $i= 0;
  
    for($i;$i<count($articles);$i++):

        $title[$i] = str_replace("-", " ", $articles[$i]);
        $name[$i] = $articles[$i];
        $date[$i] = date("m/d/Y - h:i a", $unix[$i]);
        $w[$i] = get_week($unix[$i]);
        
        $u[$i] = $unix[$i]."_";
        $path[$i] = root("admin/img/", $u[$i].$name[$i]);
        $article[$i] = $path[$i].$jpg;
            
    endfor;
    
    $js_more = root("frontend/js/", "more.js");
    $root = get("/Article", "news/");
    $i = count($articles)-1;   // la lista de notas q queremos mostrar
    $ii = count($articles)-6;
    $k = count($articles)-1;
    $kk = count($articles)-6;
    $j = count($articles)-7;
    $jj = $j-6;   // los 6 articulos q mostramos con el boton MORE, luego crearemos un archivador
  }

?>

<?php if($mobile){ ?>
<main>
    <div class="container">
        <h1 class="ma--title"> ARTICLES </h1>
        <section class="articles--itemgrid">
            <?php
                for($i; $i>=$ii; $i--): ?>
            <article class="art--note">
                <div class="art--cont">
                    <a href="<?php echo $root.$articles[$i]; ?>">
                        <img class='art--cont__img' src="<?php echo $article[$i]; ?>" alt="<?php echo $name[$i] ?>" />
                    </a>
                </div>
            </article>
            <article class=art--text>
                <h5 class="art--week">WEEK #
                    <?php echo $w[$i] . ": " . $date[$i]; ?> </h5>
                <a href="<?php  echo $root.$articles[$i]; ?>">
                    <h1 class="art--title"><?php  echo $title[$i]; ?></h1>
                </a>
            </article>

            <?php endfor; ?>
        </section>

        <div class="articles--ajax" id="more_ajax">
            <?php  for($j; $j>$jj; $j--): ?>
            <article class=art--text>
                <a href="<?php  echo $root.$articles[$j]; ?>">
                    <h1 class="aside--title"><?php  echo $title[$j]; ?></h1>
                </a>
            </article>

            <?php endfor; ?>

        </div>
        <button class="more" id="more">MORE</button>

    </div>

    <script src="<?php echo $js_more; ?>" type="text/javascript"> </script>
</main>
<?php } else { ?>

<main>
    <article class="ma--title ma--container">
        <h1> ARTICLES</h1>
    </article>

    <div class="ma--container__std">
        <section class="ma--articles-grid">
            <aside class="aside--itemgrid">
                <div class="aside--lastart">
                    <h1 class="aside--title">LAST ARTICLES</h1>
                    <?php for($i; $i>=$ii; $i--):?>
                    <a href="<?php echo $root.$articles[$i]; ?>">
                        <h3 class="aside--news"><?php echo $title[$i]; ?></h3>
                    </a>
                    <?php endfor;?>

                </div>
            </aside>

            <article class="articles--itemgrid">
                <?php
                for($k; $k>=$kk; $k--): ?>
                <article class="art--note">
                    <div class="art--cont">
                        <a href="<?php echo $root.$articles[$k]; ?>">
                            <img class='art--cont__img' src="<?php echo $article[$k]; ?>"
                                alt="<?php echo $name[$k] ?>" />
                        </a>
                    </div>
                    <div class=art--text>
                        <h5 class="art--week">WEEK #
                            <?php echo $w[$k] . ": " . $date[$k]; ?> </h5>
                        <a href="<?php echo $root.$articles[$k]; ?>">
                            <h1 class="art--title"><?php echo $title[$k]; ?></h1>
                        </a>
                    </div>
                </article>
                <?php endfor; ?>

                <div class="articles--ajax" id="more_ajax">
                    <?php  for($j; $j>$jj; $j--): ?>
                    <article class=art--note>
                        <div class="art--cont">
                            <a href="<?php  echo $root.$articles[$j]; ?>">
                                <img class='art--cont__img' src="<?php echo $article[$j]; ?>"
                                    alt="<?php echo $name[$j] ?>" />
                            </a>
                        </div>
                        <div class=art--text>
                            <h5 class="art--week">WEEK #
                                <?php echo $w[$j] . ": " . $date[$j]; ?> </h5>
                            <a href="<?php echo $root.$articles[$j]; ?>">
                                <h1 class="art--title"><?php echo $title[$j]; ?></h1>
                            </a>
                        </div>
                    </article>
                    <?php endfor; ?>
            </article>
        </section>

        <button class="more" id="more">MORE</button>
    </div>


    </div>

    <script src="<?php echo $js_more; ?>" type="text/javascript"> </script>
</main>
<?php } ?>