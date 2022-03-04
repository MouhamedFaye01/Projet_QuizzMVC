<?php
//-------------------------------------Recuperation des donnees du fichier---------------------------------------//

function find_data(string $key):array{
    $dataJson=file_get_contents(PATH_DB);
    $data=json_decode($dataJson,true);
    return $data[$key];
}
//------------------------------Enregistrement et Mis a jour des données du fichier---------------------------------//

function save_data(string $key ,array $data):array{
    return [];
}



function addData($key,array $data)
{
    $dataJson=file_get_contents(PATH_DB);
    $data=json_decode($dataJson,true);
    var_dump($data);die;
}