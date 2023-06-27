<?php
if (isset($data)) {
    //! $playoffs devuelve 1/0 analizar cual necesitamos p/ mostrar o quitar el logo.
    $playoffs = $data["playoffs"];
    $root_img = $data["root_img"];
    $mobile = $data["mobile"];
    $mainmenu = $data["mainmenu"];
    $controller = $data["controller"];
    $i = 0;
    foreach ($controller as $c) :
        $ctr[$i] = "/" . $c;
        $i++;
    endforeach;
    $r = $data["r"];
    $f = $data["f"];
    $normalize = $data["css1"];
    $estilos = $data["css2"];
    $iconos = $data["iconos"];
    $icono = array();
    $i = 0;
    foreach ($iconos as $ic) :
        $icono[$i] = $ic;
        $i++;
    endforeach;

    $css1 = root($f, $normalize);
    $css2 = root($f, $estilos);

    $favicon = root($r, $icono[0]);
    $icon_quit = root($r, $icono[1]);
    $icon_gift = root($r, $icono[2]);
    $icon_store = root($r, $icono[3]);
    $icon_linkedin = root($r, $icono[4]);
    $icon_twitch = root($r, $icono[5]);
    $icon_card = root($r, $icono[6]);
    $icon_paypal = root($r, $icono[7]);
    $icon_aviso = root($r, $icono[8]);
    $icon_menu = root($r, $icono[10]);
    $icon_slide = root($r, $icono[9]);

    if($mobile) {
        $js_menu = root("frontend/js_mobile/", "menu.js");
    } else {
        $js_menu = root("frontend/js/", "menu.js");
        $index = root("frontend/js/", "index.js");
    }

    // botonera
    $menu = get($ctr[0], "menu");
    $fullgames = get($ctr[1], "fullgames");
    $roster = get($ctr[1], "roster");
    $team = get($ctr[1], "team");
    $articles = get($ctr[1], "articles");
    $subscribe = get($ctr[0], "subscribe");
} else {
    die("Error 504");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $css1; ?>" />
    <link rel="stylesheet" href="<?php echo $css2; ?>" />
    <link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon">
    <title>2kceltics | The official website of 2kceltics season </title>
    <meta property="og:type" content="website">
    <meta name="title" property="og:title" content="The official website of 2kceltics season" />
    <meta name="image" property="og:image" content="https://www.2kceltics.com/resources/img/big-three-21-22.png">
    <meta name="description" property="og:description"
        content="Watch nba 2k games: mode-simulation; real-gameplay; 12min per quarter and much more!" />
    <meta name="theme-color" content="#6441a5">
</head>

<body>
    <?php if ($mobile) { ?>

        <header>
        <section class="container">
            <div class="he--ad">last time to watch Smart #36 wearing green</div>
            <div class="he--menu">
                <?php if ($mainmenu) { ?>
                <img class="he--arrow" id="main-menu" src="<?php echo $icon_slide; ?>" alt="menu_icon" /> <?php } ?>
                <img class="he--bars" id="menu" src="<?php echo $icon_menu; ?>" alt="menu_icon" />

                <nav class="he--nav hidden" id="menu_nav">
                    <a href="#"><img id="card" class="nav--icon" src="<?php echo $icon_card; ?>" alt="card" /></a>
                    <a href="https://www.twitch.tv/flano2" target="_blank" rel="noopener"><img class="nav--icon"
                            src="<?php echo $icon_twitch; ?>" alt="twitch"></a>
                    <a href="https://www.linkedin.com/in/dan-chanivet-574084b2/" target="_blank" rel="noopener"><img
                            class="nav--icon" src="<?php echo $icon_linkedin; ?>" alt="twitch"></a>
                    <a href="#"><img id="gift" class="nav--icon" src="<?php echo $icon_gift; ?>" alt="twitch"></a>
                    <a href="#"><img class="nav--icon" src="<?php echo $icon_store; ?>" alt="twitch"></a>
                </nav>


            </div>

            <div class="he--modal__aboutme hidden" id="aboutme">
                <img class="he--modal__yo" src="<?php echo $root_img; ?>/yo.jpg" alt=" Chanivet Dan" srcset="">
                <h1 class="he--modal__title-yo">Who am I ?</h1>

                <div class="h3--modal__yo-msg">
                    <h3>Hi everyone my name is Dan Chanivet, I'm software developer and basketball coach from
                        Argentina. Hope you to enjoy the content that I've created for us and if you have any question
                        send me an email to: <span class="he--modal__color">contact@2kceltics.xyz</span>
                    </h3>
                    <h3> I'm gonna glad to read us and you'll have an answer sooner </h3>
                </div>
            </div>

            <div class="he--modal__paypal hidden" id="donation">
                <h1 class="he--modal__title-paypal">be a contributor of 2kceltics</h1>
                <h3 class="he--modal__paypal-msg">This website was made by fans of the Boston Celtics and if you can
                    contribute it will be very important so we could give support every season and we'll be able to
                    develop some amazing new content.
                </h3>


                <div class="he--modal__btn" id="donate-button-container">
                    <div id="donate-button"></div>
                    <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
                    <script>
                    PayPal.Donation.Button({
                        env: 'production',
                        hosted_button_id: 'GGEZR5L7PJFQY',
                        image: {
                            src: 'https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif',
                            alt: 'Donate with PayPal button',
                            title: 'PayPal - The safer, easier way to pay online!',
                        }
                    }).render('#donate-button');
                    </script>
                </div>
            </div>

            <section class="he--sec">
                <article class="he--art__img"><img class="he--img" src="<?php echo $root_img; ?>/big-three-21-22.png" alt="bigthree"></article>
                <article class="he--art__img"><img class="he--img" src="<?php echo $root_img; ?>/celtics-logo.png" alt="logo"> </article>
            </section>
            <?php if($playoffs == 0){ ?>
            <article class="he--art__imgplayoffs"> 
                <img class="logoplayoffs" src="<?php echo $root_img; ?>/playoffs-logo.png" alt="playoffs logo" srcset="">
                <a class="he--subs" href="<?php echo $subscribe; ?>">Tipoff 2K23 subscribe</a>
            </article>
            <?php } else {?>
                <article class="he--art__imgplayoffs"> 
                <p class="he--nroSeason">2nd 2k season</p>
                <a class="he--subs" href="<?php echo $subscribe; ?>">subscribe to our newsletter</a>
                </article>
                <?php } ?>
            <h1 class="he--art__title"> The official website of 2kceltics season</h1>
        </section>

        <?php if ($mainmenu) { ?>
        <nav class="he--nav__botones hidden" id="nav-mobile">
            <a class="store-soon" href="#">CLASSIC</a>
            <a class="he--nav__btn" href="<?php echo $menu; ?>">MAIN</a>
            <a class="he--nav__btn" href="<?php echo $fullgames; ?>">FULLGAMES</a>
            <a class="he--nav__btn" href="<?php echo $roster; ?>">LINEUPS</a>
            <a class="he--nav__btn" href="<?php echo $articles; ?>">ARTICLES</a>
            <a class="store-soon" href="#">MARKET</a>
        </nav>
        <?php } ?>

        <script src="<?php echo $js_menu; ?>"></script>
    </header>

    <?php } else { ?>

    <header>
        <div class=" he--ad">last time to watch Smart #36 wearing green</div>
        <div class="he--container">
            <article class="he--art__big3">
                <img class="he--img__big3" src="<?php echo $root_img; ?>/big-three-21-22.png" alt="big three" srcset="">
            </article>
            <article class="he--art__logo">
                <img class="he--img__logo" src="<?php echo $root_img; ?>/celtics-logo.png" alt="celtics logo" srcset="">
            </article>
            <?php if($playoffs != "false"){ ?>
                <article class="he--art__imgplayoffs"> 
                    <img class="logoplayoffs" src="<?php echo $root_img; ?>/playoffs-logo.png" alt="playoffs logo" srcset="">
                </article>
            <?php } else {?>
                <article class="he--art__imgplayoffs">
                
                </article>
            <?php } ?>    
                
                    
            <section class="he--sec">
                <nav class="he--sec__nav flex-row m-11 s-hid">
                    <span>about me:</span>
                    <a href="#"><img id="card" class="nav--icon card" src="<?php echo $icon_card; ?>" alt="card" /></a>
                    <a href="https://www.twitch.tv/flano2" target="_blank" rel="noopener"><img class="nav--icon"
                            src="<?php echo $icon_twitch; ?>" alt="twitch"></a>
                    <a href="https://www.linkedin.com/in/dan-chanivet-574084b2/" target="_blank" rel="noopener"><img
                            class="nav--icon" src="<?php echo $icon_linkedin; ?>" alt="twitch"></a>
                    <a href="#"><img id="gift" class="nav--icon" src="<?php echo $icon_gift; ?>" alt="twitch"></a>
                    <a href="#"><img class="nav--icon" src="<?php echo $icon_store; ?>" alt="twitch"></a>
                </nav>
                <a class="he--subs" href="<?php echo $subscribe; ?>">Subscribe to our newsletter 2k23 season</a>
                <div class="he--sec__title">
                    <h1>The official website <br>of 2kceltics season</h1>
                </div>

                <div class="he--modal__aboutme he--modal hidden" id="aboutme">
                    <img class="he--modal__yo" src="<?php echo $root_img; ?>/yo.jpg" alt="Chanivet Dan" srcset="">
                    <h1 class="he--modal__title-yo">who am I ?</h1>

                    <div class="h3--modal__yo-msg">
                        <h3>Hi everyone my name is Dan Chanivet, I'm software developer and basketball coach from
                            Argentina. Hope you to enjoy the content that I've created for us and if you have any
                            question send me an email to: <span class="he--modal__color">contact@2kceltics.xyz</span>
                        </h3>
                        <h3> I'm gonna glad to read us and you'll have an answer sooner </h3>
                    </div>
                </div>

                <div class="he--modal__paypal hidden" id="donation">
                    <h1 class="he--modal__title-paypal">be a contributor of 2kceltics</h1>
                    <h3 class="he--modal__paypal-msg">This website was made by fans of the Boston Celtics and if you can
                        contribute it will be very important so we could give support every season and we'll be able to
                        develop some amazing new content.
                    </h3>


                    <div class="he--modal__btn" id="donate-button-container">
                        <div id="donate-button"></div>
                        <script src="https://www.paypalobjects.com/donate/sdk/donate-sdk.js" charset="UTF-8"></script>
                        <script>
                        PayPal.Donation.Button({
                            env: 'production',
                            hosted_button_id: 'GGEZR5L7PJFQY',
                            image: {
                                src: 'https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif',
                                alt: 'Donate with PayPal button',
                                title: 'PayPal - The safer, easier way to pay online!',
                            }
                        }).render('#donate-button');
                        </script>
                    </div>
                </div>
            </section>
        </div>

        <?php if ($mainmenu) { ?> <div class="he--mainmenu he--container">
            <nav class="he--nav__botones">
                <a class="store-soon" href="#">CLASSICGAMES</a>
                <a class="he--nav__btn" href="<?php echo $menu; ?>">MAIN</a>
                <a class="he--nav__btn" href="<?php echo $fullgames; ?>">FULLGAMES</a>
                <a class="he--nav__btn" href="<?php echo $roster; ?>">LINEUPS</a>
                <a class="he--nav__btn" href="<?php echo $articles; ?>">ARTICLES</a>
                <a class="store-soon" href="#">MARKET</a>
            </nav>
        </div> <?php } ?>
    </header>
    <?php } ?>