<?php 

if(isset($data["controller"]))
{   
    $root = get("Content", "fullgames");
    $logo = root("resources/icons/","celtics-logo-favicon.png");
    $root_players = $data["root_players"];
    $name_players = $data["players"];
    $players = array();
    $names = array();
    for($i=0; $i<count($root_players); $i++):
        $players[$i] = $root_players[$i];
        $names[$i] = ucwords($name_players[$i]);
    endfor;
}

?>

<?php if($mobile) { ?>
<main>
    <div class="container">
        <h1 class="ma--title"> LINEUPS </h1>
        </article>
        <section class="ma--grid">
            <article>
                <p>1</p>
            </article>
            <article>
                <p>2</p>
            </article>
            <article>
                <p>3</p>
            </article>
            <article>
                <p>4</p>
            </article>
            <article>
                <p>5</p>
            </article>
        </section>
    </div>
</main>
<?php } else {?>

<main>
    <article class="ma--title ma--container">
        <h1> LINEUPS </h1>
    </article>
    <div class="ma--container__std">
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
                        <p class="card--name">#7 SG <?php echo $names[1]; ?></p>
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
                        <p class="card--name">#0 SF <?php echo $names[2]; ?></p>
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
                        <p class="card--name">#42 PF <?php echo $names[3]; ?></p>
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
                        <p class="card--name">#44 C <?php echo $names[4]; ?></p>
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
                        <p class="card--name">#11 PG <?php echo $names[5]; ?></p>
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
                        <p class="card--name">#9 SG <?php echo $names[6]; ?>
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
                        <p class="card--name">#26 SF <?php echo $names[7]; ?>
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
                        <p class="card--name">#12 PF <?php echo $names[8]; ?>
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
                        <p class="card--name">#27 C <?php echo $names[9]; ?>
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
                        <p class="card--name">#8 PG <?php echo $names[10]; ?>
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
                        <p class="card--name">#13 SG <?php echo $names[11]; ?>
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
                        <p class="card--name">#97 SF <?php echo $names[12]; ?>
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
                        <p class="card--name">#30 PF <?php echo $names[13]; ?>
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
                        <p class="card--name">#40 C <?php echo $names[14]; ?>
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