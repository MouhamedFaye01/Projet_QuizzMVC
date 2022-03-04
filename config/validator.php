<?php
function champ_obligatoire(string $key,string $data,array $error,string $message="ce champ est obligatoire"){
    if(empty($data)){
        $error[$key] = $message;
    }

}


function valid_email(string $key,string $data,array $error,string $message="email invalid"){
    if(!filter_var($data , FILTER_VALIDATE_EMAIL )){
        $error[$key] = $message;
    }

}