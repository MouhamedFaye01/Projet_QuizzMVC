
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
                $avatar = $_FILES['avatar'];
         
                $score = $_REQUEST['score'];

               inscrire($nom,$prenom,$login,$password,$confirm,$role,$score,$avatar);
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
        //--------------------------Redirection à la page de connexion----------------------//
        
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


         function inscrire(string $nom,string $prenom,string $login,string $password,string $password1,string $role, string $score,$avatar):void{

            $errors = [];
         champ_obligatoire('nom', $nom,$errors,"Le nom obligatoire");
         champ_obligatoire('prenom', $prenom,$errors,"Le prenom est obligatoire");
         champ_obligatoire('login', $login,$errors,"l'adresse email est obligatoire");
         champ_obligatoire('password1', $password1,$errors,"Mot de passe requis  ");
        
                //-----------------------vaidité email et mot de passe----------------------------//
        
            if(count($errors)==0){
                valid_email('login',$login,$errors,"Invalide email");

            }
            champ_obligatoire('password',$password,$errors,"Le mot de passe est obligatoire");
            if ($password != $password1) {
                $errors['confirm'] = "Les mots de passes doivent etre identiques !";
            }
                //----------------------Email existant----------------------------//
            find_user_login($login);
            if(find_user_login($login)){
                $errors['error_login']= "Email existant";             
            }
            if($avatar['name']==""){
                $errors['error_format']="veuillez choisir une photo";
            }
           
           
            if(count($errors)==0){

                $picName = explode("@",$login,-1);//-------------extraire avant @-----------------// 
                $picName[0] .= $role;//--------------concaténation---------------//

                $extension = explode('.',$avatar['name']);
                $avatar['name'] = $picName[0].'.'.$extension[1];//-----------renommer une image------------//
             
                
                $newUser=[
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "login" => $login,
                    "password" => $password,
                    "role" => $role,
                    "photo" => $avatar["name"],
                    "score"=> $score
                ];
                
                //-----------------Amener les images dans le dossier uploads--------------------//

                if (upload_file($avatar)) {
             
                    array_to_json($newUser,"users");
                    header("location:".WEB_ROOT."?controller=securite&action=connexion" ); 
                }else{
                 
                $errors['error_format']="verifier le format";
                $_SESSION[KEY_ERRORS]=$errors;
                if (is_connect()) {

                    header("location:".WEB_ROOT."?controller=user&action=creation.admin" ); 
                }else {

                    header("location:".WEB_ROOT."?controller=securite&action=inscription" ); 
                    
                }
                }

                //----------------Enregistrement d'un nouveau joueur et redirection------------//
        
        
              
               
               
            

            
        
            }else{
         
                $_SESSION[KEY_ERRORS]=$errors; 
                if (is_connect()) {
                    header("location:".WEB_ROOT."?controller=user&action=creation.admin" ); 
                }else {
           
                    header("location:".WEB_ROOT."?controller=securite&action=inscription" ); 
                    
                } 
               
        
            }
        
        
        
        
         }  
