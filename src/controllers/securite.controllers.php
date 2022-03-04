
<?php
//------------------------------------Traitement des Requetes POST-----------------------------------------//

require_once (PATH_SRC."Models" .DIRECTORY_SEPARATOR. 'user.model.php');

if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_REQUEST['action'])){
            if($_REQUEST['action']=="connexion"){
                $login=$_REQUEST['login'];
                $password=$_REQUEST['password'];
                 connexion($login,$password);
            }elseif ($_REQUEST['action']=="inscription") {
                $nom = $_REQUEST['nom'];
                $prenom = $_REQUEST['prenom'];
                $login = $_REQUEST['login'];
                $password = $_REQUEST['password'];
                $confirm = $_REQUEST['confirm'];
                $role = $_REQUEST['role'];
                $avatar = $_REQUEST['avatar'];

               inscrire($nom,$prenom,$login,$password,$role,$avatar);
            }
        }
}

////------------------------------------Traitement des Requetes GET-----------------------------------------//

if($_SERVER['REQUEST_METHOD']=="GET"){
        if(isset($_REQUEST['action'])){
                if($_REQUEST['action']=="connexion"){
                        
                        presentation_connexion();
                }elseif ($_REQUEST['action']=="logout") {
                    logout();
                }elseif($_REQUEST['action']=="inscription"){
                    require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."inscription.html.php");   
                }
        }else{
            require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");   


        }
}
////------------------------------------Traitement des Requetes GET-----------------------------------------//

function connexion(string $login,string $password):void{
        
        $error=[];
        //-----------coté login------------//
       champ_obligatoire('login',$login,$error);
       if(count($error)==0){
           valid_email('login',$login,$error);
       }
        //-----------coté password----------//

       champ_obligatoire('password',$password,$error);
       if(count($error)==0){
           //
           $user = find_user_login_password($login ,$password);
           if(count($user)!=0){
        
   
        //--------------utilisateur existant---------------//

               $_SESSION[KEY_USER_CONNECT]=$user;
               require_once(PATH_VIEWS."user/accueil.html.php");
   
             
            }else{
        //--------------utilisateur inexistant---------------//

               $error['connexion']="Login ou mot de passe incorrecte";
               $_SESSION[KEY_ERRORS]=$error;
               header("location:".WEB_ROOT);
               exit();
            }
          
       }else{
        
        //--------------Erreur de validation---------------//

           $_SESSION[KEY_ERRORS]=$error;
           header("location:".WEB_ROOT); 
           exit();
       }
    }

function presentation_connexion(){
    require_once(PATH_VIEWS."securite".DIRECTORY_SEPARATOR."connexion.html.php");   
       
    }
         //--------------------------Destruction des sessions pour la déconnexion-----------------------//

function logout(){
    session_destroy();
    unset($_SESSION[KEY_USER_CONNECT]);
    unset($_SESSION[KEY_ERRORS]);
    header('location: ' . WEB_ROOT);
    exit();
}
         //--------------------------------Inscription d'un joueur--------------------------------------//


function inscrire($nom,$prenom,$login,$password,$role,$avatar)
{
    $errors=[];
    champ_obligatoire('nom',$nom,$error);
    champ_obligatoire('prenom',$prenom,$error);
    champ_obligatoire('login',$login,$error);
    champ_obligatoire('password',$password,$error);
    champ_obligatoire('avatar',$avatar,$error);


    if (count($errors) == 0) {
        addUser();
    }
   
    
}