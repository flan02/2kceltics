<?php
    if($_GET["game"]){
        $menu = get($ctr[0], "menu");
        $get = $_GET["game"];
        $color_error = "error";
        $background = root("resources/video/", "film-grain-background.mp4");
    }
    switch($get):
        case "Subscribed": $msg = "{$get} we send you an email check out your inbox. Stay tuned for more updates";
        break;
        case "Duplicated": $msg = "{$get}. We couldn't register your email. It was registered previously";
        break;
        default: $msg = "Error 500 bad petition. Try again later";    
    endswitch;
    
    
?>


<main>
    <?php if($mobile){ ?>
        <div class="ma--container__subs headers">
            <div class="headers--link">
                <a class="headers--link__a" href="<?php echo $menu; ?>">redirect to 2kceltics</a>
            </div>
            <div class="headers--h2">
                <h2 class="headers--msg <?php if($get == "Duplicated") echo $color_error ?>"><?php echo $msg; ?></h2>  
            </div>
             <video class="subs--backgroundvideo" playsinline autoplay muted loop >
                <source src='<?php echo $background; ?>'>
            </video> 
        </div>
        
           
    <?php } else { ?>
    <div class="ma--container__subs headers">
        <div class="headers--h2">
        <h2 class="headers--msg <?php if($get == "Duplicated") echo $color_error ?>"><?php echo $msg; ?></h2>  
        </div>
        <div class="headers--link">
        <a class="headers--link__a" href="<?php echo $menu; ?>">redirect to 2kceltics</a>
        </div>
        <video class="subs--backgroundvideo" playsinline autoplay muted loop >
            <source src='<?php echo $background; ?>'>
        </video>
    </div>
    <?php } ?>
</main>