<?php
//-------------------------------------Recupération des données du fichier---------------------------------------//

function find_data(string $key):array{
    $dataJson=file_get_contents(PATH_DB);
    $data=json_decode($dataJson,true);
    return $data[$key];
}
//------------------------------Enregistrement et Mis a jour des données du fichier---------------------------------//

function save_data(string $key ,array $data):array{
    return [];
}


//--------------------------Recupération des données du fichier et décodage en tableau---------------------------//

function array_to_json(array $newUser, $key){ 

    $dataJason=file_get_contents(PATH_DB);//------------récupération du fichier------------------//

    $data=json_decode($dataJason,true);  //-------------décodage en tableau---------------------//

    $data[$key][] = $newUser;
    $final_data=json_encode($data);
    file_put_contents(PATH_DB , $final_data);

}



