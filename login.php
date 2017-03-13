<?php
/* if (!defined("BASE_PATH")) define('BASE_PATH', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : substr($_SERVER['PATH_TRANSLATED'],0, -1*strlen($_SERVER['SCRIPT_NAME']))); */
$hsm_execute = "/hsm/login_execute.php";
$hsm_initialize = "/hsm/include/initialize.php";
$hsm_execute = realpath($hsm_execute);
$hsm_initialize = realpath($hsm_initialize);

/* initialize.php for calling the hsmx functions */
require_once($_SERVER['DOCUMENT_ROOT'].$hsm_initialize);

 /* login_execute.php, responsible for the login + registration */
require($_SERVER['DOCUMENT_ROOT'].$hsm_execute);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>HSMX SMS sample</title>
        <link rel="stylesheet" type="text/css" href="css/mystyle.css"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="jquery/jquery-1.11.1.min.js"></script>
        <!-- jquery for showing the registration form -->
        <script>       
        $(document).ready(function(){
            $("#registerAccount").click(function(){
             $("#register").slideToggle("slow,");
        });
        });
        </script>

    </head>
    <body <?=($error!=""?'onload="document.loginForm.username.focus(); alert(\'' . $error . '\')"':'')?> <?=($error_guest!=""?'onload="document.guestloginForm.submit_in_house_guest.focus(); alert(\'' . $error_guest . '\')"':'')?>>
        <div id="wrapper">
            <div id="header">
		<br>
                <td><label class="feature_img"><img src="images/BKK-Logo.jpg"></label></br>
		<br>
		<br>
		</tr>
            </div>
            <div id="content">  
                <div id="login">
                    <?php
                    if($mail_setting->enable_voucher==1)
{
                    ?>
                    <form method="post" onSubmit="this.submitbutton.disabled=true;">
                    <input type="hidden" name="login" value="true">                    
                    <?php if($mail_setting->code_only==1) { ?>
                    <b>Voucher code:</b>
                    <input type="text" class="loginInput" name="username" value="<?=$username?>" onKeyUp="document.loginForm.password.value=document.loginForm.username.value">
                    <input type="hidden" name="password">
                    <?php } else { ?>
			<label class="feature_h">Velkommen til BKK WIFI gjestenett</br>
			<label class="feature">For tilgang registrer ditt Mobilnummer (blir brukernavn)</br>  
			<label class="feature">Passord for 24t tilgang sendes via SMS til registrert mobilnummer</br>
			<label class="feature">Trykk link nederst for registrering</br>
			<br>       
                        <label class="loginLabel">Mobilnr m/landkode</label></br>
                        <input type="text" class="loginInput" name="username" value="<?=$user?>" placeholder="Brukernavn"></br>
                        <label class="loginLabel">Passord:</label></br>
                        <input type="password" class="loginInput" name="password" placeholder="Passord"></br>
                    
                    <?php
                }
                    ?>                                                         <!-- to disable the button in portal preview mode -->
                    <input name="submitbutton" type="submit" class="btnSubmit"<?=(isset($_SESSION['PORTAL']['preview'])?"disabled":"")?> value="Login">
                    </form>
                    <?php
                }
                    ?>
                </div>
		<br>
		<label class="feature_h">NB! Landkode+mobilnr (eks. Norge 4712345678)</br>
                <a href="#" id="registerAccount"><label class="feature_b">Registrering av mobilnummer</a>
                <div id="register">
                    <form  method="post">
                        <!-- to perform the registation -->
                        <input type="hidden" name="register"/>
                        <input type="hidden" name="id" value="1"/>
                        <?php
                    /* Getting the fields + labels configured in the registration form
                     * $register_forms[1], the value is to select the correct registration form
                     * $register_forms[1] needs to have the same value as register_forms[1]
                     */
                        foreach($register_forms[1]->fields as $field=>$config)
                {
                                if($config->show==1)
                {
                                ?>
                                <label  class="loginLabel" for="<?=$field?>" >Mobilnummer</label></br>                      
                                <input  class="loginInput" id="<?=$field?>" name="<?=$field?>" <?=$config->html5==1 && $config->validate==2?"pattern='".$config->regex."'":""?> <?=$config->html5==1 && $config->validate>0?"required":""?> type="<?=$config->input_type?>" value="<?=$_POST[$field]?>"/></br>

                        <?php
                }
                } 
                        ?>                                                          <!-- to disable the button in portal preview mode -->
                        <input type="submit" class="btnSubmit" value="Register" <?=(isset($_SESSION['PORTAL']['preview'])?"disabled":"")?> name="register"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
                   
