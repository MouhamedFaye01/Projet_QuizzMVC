<?php
// ---------------------------------Chemin du dossier racine du projet------------------------------------------//

define("ROOT",str_replace("public".DIRECTORY_SEPARATOR."index.php","",$_SERVER['SCRIPT_FILENAME']));

//----------------------------------Chemin du src (controller et models)---------------------------------------//

define("PATH_SRC",ROOT."src".DIRECTORY_SEPARATOR);

//----------------------------------Chemin des templates-------------------------------------------------------//

define("PATH_VIEWS",ROOT."templates".DIRECTORY_SEPARATOR);

//----------------------------------Chemin du data -----------------------------------------------------------//

define("PATH_DB",ROOT."data".DIRECTORY_SEPARATOR);

//---------------------------Chemin du dossier public pour inclusion images,css et js-------------------------//

define("WEB_ROOT","http://localhost:8003/Projet_QuizzMVC/public");

//-----------------------------URL pour charger les images et les fichiers css--------------------------------//

define("WEB_PUBLIC",str_replace("index.php","",$_SERVER['SCRIPT_NAME']));

//-------------------------------------------------Clé d'erreurs---------------------------------------------------//

define("KEY_ERRORS","errors");

//--------------------------------------Clé d'utilisateur connecté---------------------------------------------------//

define("KEY_USER_CONNECT","user-connect");

//--------------------------------------Clé d'utilisateur joueur---------------------------------------------------//

define ("ROLE_JOUEUR","ROLE_JOUEUR");

//--------------------------------------Clé d'utilisateur admin---------------------------------------------------//

define ('ROLE_ADMIN','ROLE_ADMIN');


