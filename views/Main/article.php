<?php

if(isset($data["articles"]))
{
    $articles = $data["articles"];
    
    $buff = $data["buff"];
    
    $article = $data["art"];
    $article_explode = explode("_", $article);

    $unix = $article_explode[0];
    
    $date = date("m/d/Y - h:i:s a", $unix);   // parseamos la fecha unix y la guardamos
    $week = get_week($unix);
    $title_main = $article_explode[1];
    $title_main = str_replace("-", " ", $title_main);
   
    $path = $article . ".jpg";
    $txt = $article . ".txt";
    
    $jpg = ".jpg";
    $img = root("admin/img/", $path);
    $text = root("admin/articles/", $txt);
    
    $j=0;

    //count($articles)
    for($j;$j<count($articles);$j++):
     //   echo $articles[$i] . "<br>";
        $title[$j] = str_replace("-", " ", $articles[$j]);
    endfor;

    $i = count($articles)-1;   // la lista de notas q queremos mostrar
    $ii = count($articles)-6;

    $root = get("/Article", "news/");
    
}
    
?>

<?php if($mobile){ ?>
<main>
    <h1 class="ma--title"> ARTICLES </h1>
    <section class="section--flexbox">
        <article class="article--title">
            <h1 class="article--h1"><?php echo $title_main; ?></h1>
            <h5> WEEK # <?php echo $week . " : " . $date; ?></h5>
        </article>
        <article class="article--img">
            <img class='art--cont__img-big' src="<?php echo $img; ?>" alt="<?php echo $title_main ?>" />
        </article>
        <article class="article--note">
            <p class="article--buff"><?php echo $buff; ?></p>
        </article>
    </section>
</main>
<?php } else { ?>
<main>
    <div class="ma--container__std">
        <section class="ma--articles-grid">
            <aside class="aside--itemgrid">
                <div class="aside--lastart">
                    <h1 class="aside--title">LAST ARTICLES</h1>
                    <?php for($i; $i>=$ii; $i--): ?>
                    <a href="<?php echo $root.$articles[$i]; ?>">
                        <h3 class="aside--news"><?php echo $title[$i]; ?></h3>
                    </a>
                    <?php endfor;?>
                </div>
            </aside>

            <article class="articles--itemgrid">
                <article class="article--flex">
                    <h1 class="article--title"><?php echo $title_main; ?></h1>
                    <h5 class="art--week__date"> WEEK # <?php echo $week . " : " . $date; ?></h5>
                    <article class="article--note">
                        <img class='art--cont__img-big' src="<?php echo $img; ?>" alt="<?php echo $title_main ?>" />
                    </article>
                    <p class="article--buff"><?php echo $buff; ?></p>
                </article>
            </article>
        </section>
    </div>
</main>

<?php } ?>