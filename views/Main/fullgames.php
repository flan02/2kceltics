<?php

if (isset($data["controller"])) {
    $root = get("/Content", "fullgames");
    $logo = root("resources/icons/", "celtics-logo-favicon.png");
    $icon_tv = root("resources/img/", "tdgarden.png");
    $spoiler = root("frontend/js/", "spoilers.js");
    $spoiler_mobile = root("frontend/js_mobile/", "spoilers.js");
    $cross = root("resources/icons/", "x-quit-solid.svg");
    $youtube = root("resources/icons/", "youtube.svg");

    $showgamename = $data["gamename"];
    
    if (isset($data["game"])) {
        $nrogame = $data["game"];
        $total = root("resources/img/games/", "$nrogame/gtotal.png");
        $boxscore = root("resources/img/games/", "$nrogame/boxscore.png");
    } else {
        $nrogame = " ";
    }

    if(isset($data["playoffs"])) $playoffs = $data["playoffs"];

    $current_game = $data["current_game"];

if($playoffs == "false"){
    $fix_game = $current_game - 1;
    $fix_game1 = $fix_game - 1;
    $fix_game2 = $fix_game1 - 1;
    $fix_game3 = $fix_game2 - 1;
    $fix_game4 = $fix_game3 - 1;

    $box = $current_game;
    $box1 = $current_game - 1;
    $box2 = $current_game - 2;
    $box3 = $current_game - 3;
    $box4 = $current_game - 4;

}else {
    $box = $showgamename[0];
    $box1 = $showgamename[1];
    $box2 = $showgamename[2];
    $box3 = $showgamename[3];
    $box4 = $showgamename[4];
}
    

    $season82 = $data["array_links"];   // links de los partidos de youtube
    $bos_points = $data["array_bos_points"];
    $rival_points = $data["array_rival_points"];
    $rival_name = $data["array_rival_name"];
    $ancla = "#display";   // ancla p/ redirigir a los videos

}

if($playoffs == "true"){
    switch($nrogame):
        case $box: $adjust_game = count($season82)-1;
        break;
        case $box1: $adjust_game = count($season82)-2;
        break;
        case $box2: $adjust_game = count($season82)-3;
        break;
        case $box3: $adjust_game = count($season82)-4;
        break;
        case $box4: $adjust_game = count($season82)-5;
        break;
    endswitch;    
    } else {
        $adjust_game = $nrogame - 1;
    };

?>


<?php if ($mobile) { ?>
<main>
    <div class="container">
        <h1 class="ma--title"> FULL GAMES </h1>
        <section class="ma--choosegame">
            <a class="ma--game" href="<?php echo $root . "/" . $box . $ancla; ?>">
                <img class="ma--game__logo" src='<?php echo $logo; ?>' alt="logo">
                <span class="ma--game__span"><?php echo "game " . "#" . $box; ?></span></a>
            <a class="ma--game" href="<?php echo $root . "/" . $box1 . $ancla; ?>">
                <img class="ma--game__logo" src='<?php echo $logo; ?>' alt="logo">
                <span class="ma--game__span"><?php echo "game " . "#" . $box1; ?></span></a>
            <a class="ma--game" href="<?php echo $root . "/" . $box2 . $ancla; ?>">
                <img class="ma--game__logo" src='<?php echo $logo; ?>' alt="logo">
                <span class="ma--game__span"><?php echo "game " . "#" . $box2; ?></span></a>
            <a class="ma--game" href="<?php echo $root . "/" . $box3 . $ancla; ?>">
                <img class="ma--game__logo" src='<?php echo $logo; ?>' alt="logo">
                <span class="ma--game__span"><?php echo "game " . "#" . $box3; ?></span></a>
            <a class="ma--game" href="<?php echo $root . "/" . $box4 . $ancla; ?>">
                <img class="ma--game__logo" src='<?php echo $logo; ?>' alt="logo">
                <span class="ma--game__span"><?php echo "game " . "#" . $box4; ?></span></a>
        </section>

        <br>
        <section class="ma--media">
            <?php if ($nrogame != " ") { ?>
            <iframe class="ma--iframe" id="display"
                src="<?php echo $season82[$adjust_game]; ?>?controls=2&showinfo=1&modestbranding=1&rel=0&theme=light&showsearch=0"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <?php } else { ?>
            <div class="ma--iframe__display">
                <img class="ma--iframe__logo" src='<?php echo $icon_tv; ?>' alt="tv" />
            </div>
            <?php } ?>

            <section class="ma--spoiler">
                    <article class="ma--spoiler__title">
                    <p>GAME RESULTS</p>
                    </article>
                    <?php if ($nrogame !== " ") { ?>
                    <div class="ma--spoiler__results">
                        <p class="ma--spoiler__text"></p><?php echo "game # $nrogame: "; ?></p>
                    </div>

                <article class="ma--spoiler__botones">
                    <p><button id="btn--spoiler1" class="ma--spoiler__btn">FINAL STATS</button></p>
                    <p><button id="btn--spoiler2" class="ma--spoiler__btn">BOXSCORE</button></p>
                </article>
    
                <?php } ?>

                <article class="ma--spoiler__youtube">
                    <p class=" ma--spoiler__p">...or you can watch every game in our channel</p>
                    <a class="ma--spoiler__icon" target="_blank" rel="noreferrer noopener"
                        href="https://www.youtube.com/playlist?list=PLFAsJY1mWn5YFwuuFGqgShhU9pauneNdC">
                        <img class="ma--spoiler__icon" src="<?php echo $youtube; ?>" alt="youtube">
                    </a>

                </article>

            </section>
        </section>
    </div>
    <?php
        if ($nrogame !== " ") : ?>
    <div class="modal" id="modal">
        <div class=modal--box>
            <img class="modal--box__img" src="<?php echo $total; ?>" alt="game total">
        </div>
        <div class="modal--quit">
            <img class="modal--quit__cross" id="crossclose" src='<?php echo $cross; ?>' alt="quit" />
        </div>
    </div>
    <div class="modal" id="modal2">
        <div class=modal--box>
            <img class="modal--box__img" src="<?php echo $boxscore; ?>" alt="game total">
        </div>
        <div class="modal--quit">
            <img class="modal--quit__cross" id="crossclose2" src='<?php echo $cross; ?>' alt="quit" />
        </div>
    </div>
    <?php endif; ?>
    <script src="<?php echo $spoiler_mobile; ?>" type="text/javascript"> </script>
</main>

<?php } else { ?>

<main>
    <article class="ma--title ma--container">
        <h1> FULL GAMES </h1>
    </article>

    <div class="ma--container__std">
        <h2 class="ma--subtitle">WATCH LAST 5 GAMES</h2>
        <section class="ma--choosegame">
            <a class="ma--game" href="<?php echo $root . "/" . $box . $ancla; ?>">
                <img class="ma--game__logo" src='<?php echo $logo; ?>' alt="logo">
                <span class="ma--game__span"><?php echo "game " . "#" . $box; ?></span></a>
            <a class="ma--game" href="<?php echo $root . "/" . $box1 . $ancla; ?>">
                <img class="ma--game__logo" src='<?php echo $logo; ?>' alt="logo">
                <span class="ma--game__span"><?php echo "game " . "#" . $box1; ?></span></a>
            <a class="ma--game" href="<?php echo $root . "/" . $box2. $ancla; ?>">
                <img class="ma--game__logo" src='<?php echo $logo; ?>' alt="logo">
                <span class="ma--game__span"><?php echo "game " . "#" . $box2; ?></span></a>
            <a class="ma--game" href="<?php echo $root . "/" . $box3 . $ancla; ?>">
                <img class="ma--game__logo" src='<?php echo $logo; ?>' alt="logo">
                <span class="ma--game__span"><?php echo "game " . "#" . $box3; ?></span></a>
            <a class="ma--game" href="<?php echo $root . "/" . $box4 . $ancla; ?>">
                <img class="ma--game__logo" src='<?php echo $logo; ?>' alt="logo">
                <span class="ma--game__span"><?php echo "game " . "#" . $box4; ?></span></a>
        </section>

        <section class="ma--media">            
            <?php if ($nrogame != " ") { ?>
            <iframe class="ma--iframe" id="display"
                src="<?php echo $season82[$adjust_game]; ?>?controls=2&showinfo=1&modestbranding=1&rel=0&theme=light&showsearch=0"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            <?php } else { ?>
            <div class="ma--iframe__display">
                <img class="ma--iframe__logo" src='<?php echo $icon_tv; ?>' alt="tv" />
            </div>
            <?php } ?>
 
            <section class="ma--spoiler">
                <article class="ma--spoiler__title">
                    <p>GAME RESULTS</p>
                </article>

                <?php if ($nrogame !== " ") { ?>
                <article class="ma--spoiler__results">
                    <p><?php echo "game # $nrogame: "; ?></p>
                </article>

                <article class="ma--spoiler__botones">
                    <p><button id="btn--spoiler1" class="ma--spoiler__btn">FINAL STATS</button></p>
                </article>

                <article class="ma--spoiler__botones">
                    <p><button id="btn--spoiler2" class="ma--spoiler__btn">BOXSCORE</button></p>
                </article>
                <?php } ?>

                <article class="ma--spoiler__youtube">
                    <p class=" ma--spoiler__p">...or you can watch every game in our channel</p>
                    <a class="ma--spoiler__icon" target="_blank" rel="noreferrer noopener"
                        href="https://www.youtube.com/playlist?list=PLFAsJY1mWn5YFwuuFGqgShhU9pauneNdC">
                        <img class="" src="<?php echo $youtube; ?>" alt="youtube">
                    </a>
                </article>

            </section>
        </section>
    </div>
    <?php
        if ($nrogame !== " ") : ?>
    <div class="modal" id="modal">
        <div class=modal--box>
            <img class="modal--box__img" src="<?php echo $total; ?>" alt="game total">
        </div>
        <div class="modal--quit">
            <img class="modal--quit__cross" id="crossclose" src='<?php echo $cross; ?>' alt="quit" />
        </div>
    </div>
    <div class="modal" id="modal2">
        <div class=modal--box>
            <img class="modal--box__img" src="<?php echo $boxscore; ?>" alt="game total">
        </div>
        <div class="modal--quit">
            <img class="modal--quit__cross" id="crossclose2" src='<?php echo $cross; ?>' alt="quit" />
        </div>
    </div>
    <?php endif; ?>

    <script src="<?php echo $spoiler; ?>" type="text/javascript"> </script>

</main>
<?php } ?>