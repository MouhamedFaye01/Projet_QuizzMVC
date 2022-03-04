<?php

function find_user_login_password(string $login,string $password):array{
        $users=find_data("users");
        foreach ($users as $user) {
            if( $user['login']==$login && $user['password']==$password)
                return $user;
            }
                return [];
}
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