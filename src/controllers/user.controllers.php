<?php
//  -----------------------------------Redirection vers les pages-------------------------------------------//

require_once (PATH_SRC."Models" .DIRECTORY_SEPARATOR. 'user.model.php');

if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_REQUEST['action'])){

        //----------Page liste joueurs---------//

        if($_REQUEST['action'] == "liste.joueur"){
            afficheJoueur();
        }
        //----------Page liste questions---------//

        if($_REQUEST['action'] == "liste.question"){
            afficheQuestion();
        }
        //----------Page création question---------//

        if($_REQUEST['action'] == "creation.question"){
            creationQuestion();
        }
        //----------Page création admin---------//

        if($_REQUEST['action'] == "creation.admin"){
            creationAdmin();
        }

    }
}

//--------------------------------------Affichage des joueurs-------------------------------------------------//
function afficheJoueur(){
    ob_start();
    $joueurs = getRole(ROLE_JOUEUR);
    require_once (PATH_VIEWS.'user'.DIRECTORY_SEPARATOR.'liste.joueur.html.php');
    $affiche = ob_get_clean();
    require_once (PATH_VIEWS.'user'.DIRECTORY_SEPARATOR.'accueil.html.php');

}
//--------------------------------------Affichage des questions-------------------------------------------------//

function afficheQuestion(){
    ob_start();
    // $questions = getRole();
    require_once (PATH_VIEWS.'user'.DIRECTORY_SEPARATOR.'liste.question.html.php');
    $affiche = ob_get_clean();
    require_once (PATH_VIEWS.'user'.DIRECTORY_SEPARATOR.'accueil.html.php');

}
//-------------------------------Affichage de la création de questions--------------------------------------//

function creationQuestion(){
    ob_start();
    // $questions = getRole();
    require_once (PATH_VIEWS.'user'.DIRECTORY_SEPARATOR.'creation.question.html.php');
    $affiche = ob_get_clean();
    require_once (PATH_VIEWS.'user'.DIRECTORY_SEPARATOR.'accueil.html.php');

}

//---------------------------------Affichage de la création d'admin-----------------------------------//

function creationAdmin(){
    ob_start();
    // $questions = getRole();
    require_once (PATH_VIEWS.'securite'.DIRECTORY_SEPARATOR.'inscription.html.php');
    $affiche = ob_get_clean();
    require_once (PATH_VIEWS.'user'.DIRECTORY_SEPARATOR.'accueil.html.php');

}
