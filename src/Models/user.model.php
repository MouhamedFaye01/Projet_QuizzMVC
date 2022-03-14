<?php
//----------------------------vérification compte utilisateur et admin -------------------------//

function find_user_login_password(string $login,string $password):array{
        $users=find_data("users");
        foreach ($users as $user) {
            if( $user['login']==$login && $user['password']==$password)
                return $user;
            }
                return [];
}

//----------------------------------Role Admin/joueur----------------------------------------//
function getRole($key ){
    $role = [];
    $users=find_data("users");
    foreach ($users as $user) {
        if ($user['role'] == $key) {
            $role[] = $user;
        }
    }
    return $role;
}

//---------------------------- Ajout utilisateur dans la clé utilisateurs--------------------------//

function addUser($nom, $prenom,$login,$password,$role,$avatar)
{
    $users=find_data("users");
    foreach ($users as $user) {
        if( $user['login']==$login ){
                        return false;
        }
    }

    addData('users', []);
}
function listeQuestion(){  
    return find_data("questions");
}
   

//-----------------------------Email existant --------------------------------//

function find_user_login(string $login):bool{
    $users=find_data("users");
    foreach ($users as $user) {
        if( $user['login']==$login )
            return true ;
        }
        return false;
    }
//----------------------------Enregistrement dans le dossier uploads----------------------------------------//

    function upload_file($file)
    {
        $mimetype = mime_content_type($file['tmp_name']);
        if(in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png','image/jpg'))) {
            move_uploaded_file($file['tmp_name'], PATH_UPLOAD.$file['name'] );
            return true;
         
         } else {
            return false;
         }
    }