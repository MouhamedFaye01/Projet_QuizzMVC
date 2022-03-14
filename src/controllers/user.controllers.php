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


if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_REQUEST['action'])) {
        if ($_REQUEST['action'] == "addQuizz") {

            
           addQuestion($_POST);
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
    $questions = listeQuestion();
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

//----------------------------------------création question----------------------------------------//
function addQuestion($tab)
{
    extract($tab);//-----------permet d'extraire (Importe les variables dans la table des symboles)-----------//


    $questions = [
        'questions' => $question,
        'nbrPoints' => $point,
        'typeReponse' => $repChoice,
    ];

    $tabReponse = [];

    if ($repChoice == 'repMultiple' || $repChoice == 'repSimple') {
        for ($i=0; $i <= $nbrReponse; $i++) {
            if (isset($tab["rep_$i"])) {
                $tabReponse[$i]['valeur'] = $tab["rep_$i"];
                    if (in_array($i, $checked)) {
                        $tabReponse[$i]['statut'] = true;
                    }else{
                        $tabReponse[$i]['statut'] = false;

                    }
            }
        }

        $questions['tabRep'] = $tabReponse;
    }elseif ($repChoice == 'repText') {
        $questions['tabRep'] = $repText;

    }



    array_to_json($questions, 'questions');
    header("location:".WEB_ROOT."?controller=user&action=creation.question");


}

function pagination($page,$tab){

    $contenu_page=($page-1)*15;
    echo"<table>";
    echo"<tr>";
    echo"<td>"; echo "Nom"; echo"</td>";
    echo"<td>"; echo "Prénom"; echo"</td>";
    echo"<td>"; echo "Score"; echo"</td>";

    echo"<tr>";
    for ($i=$contenu_page; $i<$contenu_page+15 ; $i++)
    {
                echo "<tr>";
                    if (array_key_exists($i, $tab)) {
                        echo "<td>";echo $tab[$i]['nom'];echo "</td>";
                        echo "<td>";echo $tab[$i]['prenom'];echo "</td>";
                        echo "<td>";echo $tab[$i]['score'];echo "</td>";
                   
                    }
                   
                echo "</tr>";
                  
            }
             
        echo"</table>";
}

?>
