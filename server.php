<?php

//Prelevo i dati
$dischi_json = file_get_contents("dischi.json"); //string
//Faccio la chiamata Api e la stringa la trasformo in json
$dischi_array = json_decode($dischi_json, true); //array json


//LOGICA


//Output: strutturo la risposta API in un ARRAY ASSOCIATIVO
$response = [
    "results" => $dischi_array,
    "success" => true
]; //Array associativo che in Postman lo vedi come array di object


$response_json = json_encode($response);//string
header("Content-type: application/json");
echo $dischi_json;
