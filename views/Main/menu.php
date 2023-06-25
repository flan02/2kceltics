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
    
    $playoffs_root = $data["playoffs_root"];

    for ($p = 0; $p < count($path_2k); $p++) :
        $img_2k[$p] = $path_2k[$p];
    endfor;

    //$path = url_base() . "UniServerZ localhost/framework scylla/2kceltics";

    $local = "<img class='schedule--logo' src='$root_logo/bos.png' alt='team'/>";   // la var $root se definio en el header_welcome

    $visita = array();
    for ($i = 0; $i < 82; $i++) :
        $visita[$i] = "<img class='schedule--logo' src='$root_logo/$ochentaydos[$i].png' alt='$ochentaydos[$i]' />";
    endfor;

    $root = get("/Dashboard", "menu");

    if ($pag == 1) {
        $i = 40;
        $k = 60;
        $j = 60;
        $z = 82;
        $pag2 = 2;
    } else {

        $i = 0;
        $k = 20;
        $j = 20;
        $z = 40;
        $pag = 1;
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
<main>
    <div class="container">
        <h1 class="ma--title">  
            <?php if($playoffs == "false"){ ?> <h1 class="ma--title">SCHEDULE 2K SEASON </h1> 
            <?php } else { ?>
                <h1 class="ma--title"> 2K PLAYOFFS </h1>
            <?php } ?>
            <div class="maxwidth ma--div__pstats">
                <img class="img--pstats" src="<?php echo $img_2k[0]; ?>" alt="player stats">
            </div>

        <?php if($playoffs == "false"){ ?> 
        <article class="ma--grid">
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

            <section class="ma--grid__schedule">
                <h2>NEXT GAME</h2>
                <?php if($playoffs == "false"){?>
                    <p><?php echo "game #$next_game: " . "bos vs " . $ochentaydos[$current_game]; ?>
                    <?php }else{ ?>
                     <p><?php echo "game #R4G5: " . "bos vs " . $porival; ?></p> 
                <?php } ?>    
                <span class="fake--background"> 
                    <p class="ma--contador"><span>visitors counter</span></p>
                </span>
                <span class="fake--background">
                    <p class="ma--contador"><span><?php echo $cont; ?></span></p>
                </span>
                <p><?php echo "$win W - $lose L"; ?></p>
            </section>
        </article>

        <?php if($playoffs == "false"){ ?>
        <div class="ma--pag">
            <a href="<?php echo $root . '/' . $pag; ?>">1</a>
            &nbsp;&nbsp;&nbsp;
            <a href="<?php echo $root . '/' . $pag2; ?>">2</a>
        </div>
       <?php } ?>
    </div>
</main>

<?php } else { ?>

<main id="main">
    <article class="ma--title ma--container">
        <?php if($playoffs == "false"){ ?>
            <h1> SCHEDULE 2K SEASON </h1> 
            <?php } else { ?>
            <h1> 2K PLAYOFFS </h1>
            <?php } ?>
    </article>
    
<!-- 
    <div class="maxwidth ma--div__pstats">
        <img class="img--pstats" src="<?php // echo $img_2k[0]; ?>" alt="player stats">
    </div>
-->
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
                <a href="http://">player stats</a>
                <a href="http://">standings</a>
                <a href="http://">team record</a>
                
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
                        $pag2 = 1; // switch 2
                    } else {
                        $i = 0;
                        $j = 20;
                        $z = 20;
                        $k = 40;
                        $pag = 2; // switch 1
                        $pag2 = 1; // switch 2
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
                    <h2>RECORD</h2>
                    <p class="ma--record"><?php echo "$win W - $lose L"; ?></p>
                    <br><br><br><br><br><br><br><br><br><br>
                    <span class="fake--background">
                        <p class="ma--contador"><span>visitors counter</span></p>
                    </span>
                    <span class="fake--background">
                        <p class="ma--contador"><span><?php echo $cont; ?></span></p>
                    </span>
                    

                </div>
            <!--    <img class="trecord" src="<?php // echo $img_2k[1]; ?>" alt="team record">
                <img class="standings" src="<?php // echo $img_2k[2]; ?>" alt="standings">
            -->
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
    <script src= "https://player.twitch.tv/js/embed/v1.js"></script>

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