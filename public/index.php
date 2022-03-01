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

            //-----------------------Inclusion du router-------------------------------//

require_once dirname(dirname(__FILE__))."/config/router.php";

            //-----------------------Inclusion du validator-------------------------------//

require_once dirname(dirname(__FILE__))."/config/validator.php";


