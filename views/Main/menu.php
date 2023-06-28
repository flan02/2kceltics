<?php

if (isset($data["controller"])) {
    $cont = $data["cont"];
    $pag = $data["pag"];
    $current_game = $data["current_game"];
    $current_game = $current_game -1;
    $win = $data["win"];
    $win = count($win);
    $lose = $data["lose"];
    $lose = count($lose);
    $ochentaydos = $data["ochentaydos"];
    $localia = $data["localia"];
    $root_logo = $data["root_logo"];
    $path_2k = $data["path_2kimg"];
    $playoffs = $data["playoffs"];
    $porival = $data["porival"];  
    $gamename = $data["gamename"];
    $background = "http://localhost/UniServerZ localhost/framework scylla/2kceltics_0-6-9-041522/resources/video/film-grain-background.mp4";
    $playoffs_root = $data["playoffs_root"];

    for ($p = 0; $p < count($path_2k); $p++) :
        $img_2k[$p] = $path_2k[$p];
    endfor;

    $carrousel1 = root("resources/img/carrousel/", "2kceltics2023a.png");
    $carrousel2 = root("resources/img/carrousel/", "2kceltics2023b.png");
    $carrousel3 = root("resources/img/carrousel/", "2kceltics2023c.png");
    $carrousel4 = root("resources/img/carrousel/", "2kceltics2023d.png");
    //resources/icons/x-quit-solid.svg
    $iconQuit = root("resources/icons/", "x-quit-solid.svg");
    //$path = url_base() . "UniServerZ localhost/framework scylla/2kceltics";

    $js_main = root("frontend/js_mobile/", "index.js");
    $twitch = "https://player.twitch.tv/js/embed/v1.js";

    $local = "<img class='schedule--logo' src='$root_logo/bos.png' alt='team'/>";   // la var $root se definio en el header_welcome

    $visita = array();
    for ($i = 0; $i < 82; $i++) :
        $visita[$i] = "<img class='schedule--logo' src='$root_logo/$ochentaydos[$i].png' alt='$ochentaydos[$i]' />";
    endfor;

    $root = get("/Dashboard", "menu");

    if ($pag == 2) {
        $i = 40;
        $k = 60;
        $j = 60;
        $z = 82;
        $pag = 1;
        $pag2 = 2;
    } else {

        $i = 0;
        $k = 20;
        $j = 20;
        $z = 40;
        $pag = 1;
        $pag2 = 2;
    }
} else {
    die("error 504");
}

if($playoffs == "false"){
    $next_game = $current_game + 1;
    }else{ 
    $next_game = $gamename[0];
}

?>

<?php if ($mobile) {  ?>
<span id="currentGame"> <?php echo $current_game; ?> </span>
<main >
    <div id="mainMobile">
        <section class="ma--title">  
            <?php if($playoffs == "false"){ ?> 
                <h1 class="ma--title">SCHEDULE 2K SEASON </h1> 
            <?php } else { ?>
                <h1 class="ma--title"> 2K PLAYOFFS </h1>
            <?php } ?>
        </section>
        
        <article class="ma--flexMobile">
                <section class="ma--nextGame">
                    <div>
                        <h3> NEXT GAME #<?php echo $next_game; ?></h3>
                    </div>
                    <div class="ma--nextGame__logos">
                        <span><?php echo $local; ?></span>
                        <span>VS</span>
                        <span><?php echo $visita[$current_game]; ?></span>
                    </div>
                    <div class="ma--nextGame__links">
                        <a id="pstats" href="#" class="panel__btn">Pstats</a>
                        <a id="standings" href="#" class="panel__btn">Standings</a>
                        <a id="trecord" href="#" class="panel__btn">Record</a>
                    </div>
                </section>
                <aside class="ma--aside">
                    <div class="aside--title">
                        <h2>2K23 RECORD</h2>
                        <p class="ma--record"><?php echo "$win W - $lose L"; ?></p>
                    </div> 
                    <div class="slider">
                        <div class="slider-slides">
                            <div class="slider-slide active">
                                <img src="<?php echo $carrousel1; ?>" alt="photo 1">
                            </div>
                            <div class="slider-slide">
                                <img src="<?php echo $carrousel2; ?>" alt="photo 2">
                            </div>
                            <div class="slider-slide">
                                <img src="<?php echo $carrousel3; ?>" alt="photo 3">
                            </div>
                            <div class="slider-slide">
                                <img src="<?php echo $carrousel4; ?>" alt="photo 4">
                            </div>
                        </div>
                    </div>
                </aside>
        </article>

        <?php if($playoffs == "false"){ ?> 
        <article class="ma--grid" id="mainGrid">
            <article class="ma--grid__col20">
                <section class="ma--flex">
                    <?php
                        for ($i; $i < $k; $i++) :
                            if ($localia[$i] == "l") {
                        ?>
                    <article class="ma--griditem">
                        <p class="ma--p  <?php if ($i < $current_game)   echo 'played'; ?>">
                            <?php echo $visita[$i] . " " . " " . "<span class='ma--text'>" . $ochentaydos[$i] . " " . "vs" . " " . "bos" . "</span>" .  " " . $local; ?>
                        </p>
                    </article>
                    <?php } else { ?>
                    <article class="ma--griditem">
                        <p class="ma--p   <?php if ($i < $current_game)   echo 'played'; ?>">
                            <?php echo $local . " " . " " . "<span class='ma--text'>" . "bos" . " " . "vs" . " " . $ochentaydos[$i] . "</span>" . " " . " " . $visita[$i]; ?>
                        </p>
                    </article>
                    <?php }
                        endfor ?>
                </section>

                <section class="ma--flex">
                    <?php for ($j; $j < $z; $j++) :
                            if ($localia[$j] == "l") {
                        ?>
                    <article class="ma--griditem">
                        <p class="ma--p <?php if ($j < $current_game)   echo 'played'; ?>">
                            <?php echo $visita[$j] . " " . " " . "<span class='ma--text'>" . $ochentaydos[$j] . " " . "vs" . " " . "bos" . "</span>" .  " " . $local; ?>
                        </p>
                    </article>
                    <?php } else { ?>
                    <article class="ma--griditem">
                        <p class="ma--p <?php if ($j < $current_game)   echo 'played'; ?>">
                            <?php echo $local . " " . " " . "<span class='ma--text'>" . "bos" . " " . "vs" . " " . $ochentaydos[$j] . "</span>" . " " . " " . $visita[$j]; ?>
                        </p>
                    </article>
                    <?php }
                        endfor ?>
                </section>
            </article>
        <?php } else { ?>
            <article class="ma--grid__playoffs">
                <div class="ma--gridplayoffs">
                    <img class="ma--img__playoffs" src="<?php echo $playoffs_root; ?>" alt="playoffs-picture">
                </div>
        <?php } ?>

         
        </article>

        <?php if($playoffs == "false"){ ?>
            <div>
                <span class="fake--background">
                    <p class="ma--contador"><span>visitors counter</span></p>
                </span>
                <span class="fake--background">
                    <p class="ma--contador"><span><?php echo $cont; ?></span></p>
                </span>                
            </div>
        <div class="ma--pag">
            <a href="<?php echo $root . '/' . $pag; ?>">1</a>
            &nbsp;&nbsp;&nbsp;
            <a href="<?php echo $root . '/' . $pag2; ?>">2</a>
        </div>
       <?php } ?>
       <div id="mainmodal">
           <section class="" >
               <img id="boximg" class="img--pstats" src="" alt="" >
            </section>
            <div class="modal--quit__cross" >
                <img id="maincross" src="<?php echo $iconQuit; ?>" alt="">
            </div>
        </div>
    </div>
    
</main>

<?php } else { ?>
<span id="currentGame"> <?php echo $current_game; ?> </span>
<main id="main">
    <article class="ma--title ma--container">
        <?php if($playoffs == "false"){ ?>
            <h1> SCHEDULE 2K SEASON </h1> 
            <?php } else { ?>
            <h1> 2K PLAYOFFS </h1>
            <?php } ?>
    </article>
    <article class="ma--nextGame">
            <div class="ma--nextGame__title">
            <div id="twitch"></div>
                <h3>NEXT GAME #<?php echo $next_game; ?></h3>
            </div>
            <div class="ma--nextGame__logos">
                <?php echo $local; ?>
                <span>VS</span>
                <?php echo $visita[$current_game]; ?>
            </div>
            <div class="ma--nextGame__links">
                <a id="pstats" href="#" class="panel__btn">player stats</a>
                <a id="standings" href="#" class="panel__btn">standings</a>
                <a id="trecord" href="#" class="panel__btn">team record</a>
            </div>
           
    </article>
    <div class="ma--container">
    <?php if($playoffs == "false"){ ?>
        <div class="ma--grid">        
            <div class="ma--schedule__col20">
                <?php
                    if ($pag === 2) { // switch 1
                        $i = 40;
                        $j = 60;
                        $z = 60;
                        $k = 82;
                     //   $pag = 2;
                        $pag2 = 1; // switch 2
                    } else {
                        $i = 0;
                        $j = 20;
                        $z = 20;
                        $k = 40;
                        $pag = 1; // switch 1
                        $pag2 = 2; // switch 2
                    }

                    for ($i; $i < $j; $i++) :
                        if ($localia[$i] == "l") {
                    ?>
                <article class=" ma--griditem <?php if ($i < $current_game) echo 'played'; /* ACA HACER QUE EL LOGO QUEDE OFUSCADO LUEGO DE JUGAR EL PARTIDO*/ ?>">
                    <p class="ma--p__games notplayed <?php if ($i < $current_game) echo 'played'; ?>">
                        <?php echo $visita[$i] . " " . " " . $ochentaydos[$i] . " " . "vs" . " " . "bos" . " " . " " . $local; ?>
                    </p>

                </article>
                <?php } else { ?>
                <article class="ma--griditem">
                    <p class="ma--p__games   <?php if ($i < $current_game)   echo 'played'; ?>">
                        <?php echo $local . " " . " " . "bos" . " " . "vs" . " " . $ochentaydos[$i] . " " . " " . $visita[$i]; ?>
                    </p>
                </article>
                <?php }
                    endfor ?>
            </div>

            <div class="ma--schedule__col20">
                <?php
                    for ($z; $z < $k; $z++) :
                        if ($localia[$z] == "l") {
                    ?>
                <article class="ma--griditem">
                    <p class="ma--p__games  <?php if ($z < $current_game)   echo 'played'; ?>">
                        <?php echo $visita[$z] . " " . " " . $ochentaydos[$z] . " " . "vs" . " " . "bos" . " " . " " . $local; ?>
                    </p>
                </article>
                <?php } else { ?>
                <article class="ma--griditem">
                    <p class="ma--p__games  <?php if ($z < $current_game)   echo 'played'; ?>">
                        <?php echo $local . " " . " " . "bos" . " " . "vs" . " " . $ochentaydos[$z] . " " . " " . $visita[$z]; ?>
                    </p>
                </article>
                <?php }
                    endfor ?>

            </div>

            <?php }else { ?>
                <article class="ma--gridplayoffs">
                    <img class="ma--img__playoffs" src="<?php echo $playoffs_root; ?>" alt="playoffs-picture">
                </article>
    <?php } ?>
            
                <div class="ma--section__news">  
                    <h2>2K23 RECORD</h2>
                    <p class="ma--record"><?php echo "$win W - $lose L"; ?></p>
                    <div class="slider">
                        <div class="slider-slides">
                            <div class="slider-slide active">
                                <img src="<?php echo $carrousel1 ; ?>" alt="photo 1">
                            </div>
                            <div class="slider-slide">
                                <img src="<?php echo $carrousel2 ; ?>" alt="photo 2">
                            </div>
                            <div class="slider-slide">
                                <img src="<?php echo $carrousel3 ; ?>" alt="photo 3">
                            </div>
                            <div class="slider-slide">
                                <img src="<?php echo $carrousel4 ; ?>" alt="photo 4">
                            </div>
                        </div>
                    </div>
                    <br><br><br>
                    <span class="fake--background">
                        <p class="ma--contador"><span>visitors counter</span></p>
                    </span>
                    <span class="fake--background">
                        <p class="ma--contador"><span><?php echo $cont; ?></span></p>
                    </span>
                </div>
            </section>
        </div>

    </div>
    <?php if($playoffs == "false"): ?>
    <div class="ma--pag">
        <a class="ma--pag__a" href="<?php echo $root . '/' . $pag; ?>">1-40</a>
        &nbsp;&nbsp;&nbsp;
        <a class="ma--pag__a" href="<?php echo $root . '/' . $pag2; ?>">41-82</a>
    </div>
    <?php endif; ?>

    <div id="mainmodal">
        <section class="maxwidth " >
            <img id="boximg" class="img--pstats" src="" alt="" >
        </section>
        <div class="modal--quit__cross" >
            <img id="maincross" src="<?php echo $iconQuit; ?>" alt="">
        </div>
    </div>
    
    <script src= "<?php echo $twitch; ?>"></script> 
    <script type="text/javascript">
        var options = {
        width: 400,
        height: 400,
        channel: "flano2",
        video: "",
        collection: "",
        // only needed if your site is also embedded on embed.example.com and othersite.example.com
        /*parent: ["http://127.0.0.1", "https://www.2kceltics.xyz"] */
    };
    var player = new Twitch.Player("twitch", options);
    player.setVolume(0.5);
</script>
</main>
<?php } ?>