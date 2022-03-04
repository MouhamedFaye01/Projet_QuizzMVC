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





function array_to_json(array $newUser, $key){ 

    $dataJason=file_get_contents(PATH_DB);//recup fichier

    $data=json_decode($dataJason,true);  //decode en tableau

    $data[$key][] = $newUser;
    $final_data=json_encode($data);
    file_put_contents(PATH_DB , $final_data);

}
