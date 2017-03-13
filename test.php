<?php
/* if (!defined("BASE_PATH")) define('BASE_PATH', isset($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['DOCUMENT_ROOT'] : substr($_SERVER['PATH_TRANSLATED'],0, -1*strlen($_SERVER['SCRIPT_NAME']))); */
global $hsm_execute, $hsm_initialize, $field;

$hsm_execute = "/hsm/login_execute.php";
$hsm_initialize = "/hsm/include/initialize.php";
$hsm_execute = realpath($hsm_execute);
$hsm_initialize = realpath($hsm_initialize);

echo $hsm_execute;
echo $hsm_initialize;


/* require_once($_SERVER['DOCUMENT_ROOT'].$hsm_initialize); */

/* require($_SERVER['DOCUMENT_ROOT'].$hsm_execute); */
?>

<!DOCTYPE html>
<html>
    <head>
        <title>HSMX SMS sample</title>
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
    <body >
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

                    <!-- to disable the button in portal preview mode -->
                    <input name="submitbutton" type="submit" class="btnSubmit"<?=(isset($_SESSION['PORTAL']['preview'])?"disabled":"")?> value="Login">
                    </form>
                </div>
		<br>
		<label class="feature_h">NB! Landkode+mobilnr (eks. Norge 4712345678)</br>
                <a href="#" id="registerAccount"><label class="feature_b">Registrering av mobilnummer</a>
                <div id="register">
                    <form  method="post">
                        <!-- to perform the registation -->
                        <input type="hidden" name="register"/>
                        <input type="hidden" name="id" value="1"/>
                                <label  class="loginLabel" for="0" >Mobilnummer</label></br>                      
                                <input  class="loginInput" id="0" name="0" type="text" value="123"/></br>
                        <input type="submit" class="btnSubmit" value="Register" <?=(isset($_SESSION['PORTAL']['preview'])?"disabled":"")?> name="register"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
                   
