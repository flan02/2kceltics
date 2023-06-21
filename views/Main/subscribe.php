<?php
    if(isset($data["controller"])){
        $playoffs = $data["playoffs"];
        $subscribe = get("/Dashboard", "subscribeSubmit");
        $js_subscribe = root("frontend/js/", "subscribe.js");
        $background = root("resources/video/", "film-grain-background.mp4");
    }

    if(isset($data["response"])) $response = $data["response"];
    if($response == "true"){ 
        $msj = "Email accepted. We send you and email to your inbox";
    }else { 
        $msj = "Your Email couldn't be registered";
    }

?>

<main>
    <?php if ($mobile) { ?>
        <section class="ma--container__subs">
        
            <div class="subs--form">
            
            <form action="<?php echo $subscribe; ?>" method="POST">

            <section class="form--column">
            
            <div class="form--input__subscribe">
            <label for="">First Name: </label>
            <input class="input--attr" type="text" name="name" id="" required>
            </div>
            
            <div class="form--input__subscribe">
            <label for="">Last Name: </label>
            <input class="input--attr" type="text" name="lastname" id="" required>
            </div>

            <div class="form--input__subscribe">
            <label for="">Email: </label>
            <input class="input--attr" type="email" name="email" id="" required>    
            </div>

            <div class="form--input__subscribe">
            <label for="">Your Team: </label>
            <select class="input--attr" name="favteam" id="selectnbateams" required>
                <option hidden></option>
            </select>
            </div>

            <div class="form--input__subscribe">
            <label for="">Country: </label>
            <select class="input--attr" name="country" id="selectcountries" required>
                <option hidden></option>
            </select>
            </div>

            <div class="form--input__subscribe">
            <label for="">Birthdate: </label>
            <input class="input--attr" type="date" name="birthdate" id="" min="1970-12-31" max="2022-12-31" required>
            </div>
            </section>
            
            <?php if($response != "null"){ ?>
                <div class="form--response__msj"><span class="<?php if($response == "false") echo "form--response__error"; else echo "form--response__accepted" ?>"><?php echo $msj; ?></span></div>
            <?php } ?>

            <div class="form--submit">
            <input class="form--btn__subscribe" type="submit" value="Subscribe">    
            </div>
                
            </form>
            </div>
            <video class="subs--backgroundvideo" playsinline autoplay muted loop >
                <source src='<?php echo $background; ?>'>
            </video>
        </section>
        

    <?php } else {?>
        <section class="ma--container__subs">
        <div class="subs--form">
            <form action="<?php echo $subscribe; ?>" method="POST">

            <section class="form--column">
            
            <div class="form--input__subscribe">
            <label for="">First Name: </label>
            <input class="input--attr" type="text" name="name" id="" required>
            </div>
            
            <div class="form--input__subscribe">
            <label for="">Last Name: </label>
            <input class="input--attr" type="text" name="lastname" id="" required>
            </div>

            <div class="form--input__subscribe">
            <label for="">Email: </label>
            <input class="input--attr" type="email" name="email" id="" required>    
            </div>

            <div class="form--input__subscribe">
            <label for="">Your Team: </label>
            <select class="input--attr" name="favteam" id="selectnbateams" required>
                <option hidden></option>
            </select>
            </div>

            <div class="form--input__subscribe">
            <label for="">Country: </label>
            <select class="input--attr" name="country" id="selectcountries" required>
                <option hidden></option>
            </select>
            </div>

            
            <div class="form--input__subscribe">
            <label for="">Birthdate: </label>
            <input class="input--attr" type="date" name="birthdate" id="" min="1970-12-31" max="2022-12-31" required>
            </div>
            </section>
            
            <?php if($response != "null"){ ?>
                <div class="form--response__msj"><span class="<?php if($response == "false") echo "form--response__error"; else echo "form--response__accepted" ?>"><?php echo $msj; ?></span></div>
            <?php } ?>

            <div class="form--submit">
            <input class="form--btn__subscribe" type="submit" value="Subscribe">    
            </div>
                
            </form>
            </div>
            <video class="subs--backgroundvideo" playsinline autoplay muted loop >
            <source src='<?php echo $background; ?>'>
            </video>
        </section>
        <?php } ?>
        <script src="<?php echo $js_subscribe; ?>">

        </script>
</main>