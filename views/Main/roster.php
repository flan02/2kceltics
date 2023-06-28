<?php 

if(isset($data["controller"]))
{   
    $root = get("Content", "fullgames");
    $url_players = get("/Content", "roster/");
    $logo = root("resources/icons/","celtics-logo-favicon.png");
    $root_players = $data["root_players"];
    $name_players = $data["players"];
    $data_players = $data["players_mobile"];
    $titleLink = $data["titleLink"];
    $players = array();
    $names = array();
    for($i=0; $i<count($root_players); $i++):
        $players[$i] = $root_players[$i];
        $names[$i] = ucwords($name_players[$i]);
    endfor;
}

?>

<?php if($mobile) { 
    
    if($titleLink == 0){
        $start = 0;
        $role = $titleLink + 5;
        $bench = $titleLink + 10;
        $j = 5;
    }
    if($titleLink == 5){
    $start = 0;
    $role = $titleLink + 0;
    $bench = $titleLink + 5;
    $j = 10;
    }
    if($titleLink == 10){
        $start = 0;
        $role = $titleLink + 5;
        $bench = $titleLink;
        $j=15;
    }   
    ?>


<main>
    <div class="container">
        <nav class="roster--nav">
            <a class="roster--link" href="<?php echo $url_players . $start;?>"><?php echo "STARTING-5"; ?></a>
            <a class="roster--link" href="<?php echo $url_players . $role;?>"><?php echo "ROLE"; ?></a>
            <a class="roster--link" href="<?php echo $url_players . $bench;?>"><?php echo "BENCH"; ?></a>
        </nav>
    <?php 
    for($titleLink; $titleLink< $j; $titleLink++):
    ?>    
        <figure class="roster--card">
            <img class="roster--photo" src="<?php echo $players[$titleLink]?>" alt="">
            <figcaption class="roster--figcaption"> #<?php echo $data_players[$titleLink]["nro"];?> | <?php echo $data_players[$titleLink]["pos"];?> - <?php echo $data_players[$titleLink]["name"]?></figcaption>
        </figure>
    <?php endfor; ?>
    
    </div>
</main>
<?php } else {?>

<main>
    <article class="ma--title ma--container">
        <h1> LINEUPS </h1>
    </article>
    <div class="ma--container__lineup">
        <h2 class="ma--subtitle">STARTING 5</h2>
        <section class="ma--flex__card">
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[0] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#36 PG <?php echo $names[0]; ?></p>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[1] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#9 SG <?php echo $names[1]; ?></p>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[2] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#7 SF <?php echo $names[2]; ?></p>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[3] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#0 PF <?php echo $names[3]; ?></p>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[4] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#42 C <?php echo $names[4]; ?></p>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
        </section>

        <h2 class="ma--subtitle">BENCH </h2>
        <section class="ma--flex__card">
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[5] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#13 PG <?php echo $names[5]; ?></p>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[6] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#12 PF <?php echo $names[6]; ?>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[7] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#44 C <?php echo $names[7]; ?>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[8] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#11 PG <?php echo $names[8]; ?>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[9] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#30 SF <?php echo $names[9]; ?>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
        </section>

        <h2 class="ma--subtitle">RESERVE</h2>
        <section class="ma--flex__card">
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[10] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#40 C <?php echo $names[10]; ?>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[11] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#99 SF <?php echo $names[11]; ?>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[12] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#28 C <?php echo $names[12]; ?>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[13] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#91 PF <?php echo $names[13]; ?>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
            <article class="group--card">
                <div class="item--card front">
                    <img src="<?php echo $players[14] ?>" alt="foto" srcset="">
                    <article>
                        <p class="card--name">#20 PG <?php echo $names[14]; ?>
                    </article>
                </div>
                <div class="item--card back">
                    <h1>BIOGRAPHY</h1>
                </div>
            </article>
        </section>
    </div>

</main>
<?php } ?>