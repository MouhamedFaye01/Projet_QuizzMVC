
<?php
            //-----------------------Démarrage de la session--------------------------------//
if(session_status()==PHP_SESSION_NONE){
    session_start();
    }
            //-----------------------Inclusion des constantes-------------------------------//
require_once dirname(dirname(__FILE__))."/config/constantes.php";

            //-----------------------Inclusion des orm-------------------------------//

require_once dirname(dirname(__FILE__))."/config/orm.php";

            //-----------------------Inclusion des roles-------------------------------//

require_once dirname(dirname(__FILE__))."/config/role.php";
            //-----------------------Inclusion du validator-------------------------------//

require_once dirname(dirname(__FILE__))."/config/validator.php";


require_once(PATH_VIEWS."include/header.html.php");

       //-----------------------Chargement du router-------------------------------//
  
    if (isset($_SESSION[KEY_ERRORS])) {
        $errors = $_SESSION[KEY_ERRORS];
       unset($_SESSION[KEY_ERRORS]);
    }

    

require_once dirname(dirname(__FILE__))."/config/router.php";
require_once(PATH_VIEWS."include/footer.html.php");
            
          
?>




