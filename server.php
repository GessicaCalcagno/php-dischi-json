<?php

//Prelevo i dati
$dischi_json = file_get_contents("dischi.json"); //string
//Faccio la chiamata Api e la stringa la trasformo in json
$dischi_array = json_decode($dischi_json, true); //array json


//LOGICA
//BONUS 1
for ($i = 0; $i < count($dischi_array); $i++) {
    $dischi_array[$i]['disco_liked'] = false;
};

if (isset($_POST["index"])) {
    $dischi_array[$_POST["index"]]["disco_liked"] = !$dischi_array[$_POST["index"]]["disco_liked"];
};

file_put_contents("dischi.json", json_encode($dischi_array));
//____________________________________________________

//Output: strutturo la risposta API in un ARRAY ASSOCIATIVO
$response = [
    "results" => $dischi_array,
    "success" => true
]; //Array associativo che in Postman lo vedi come array di object


$response_json = json_encode($response); //string
//serve ad impostare la comunicazione http
header("Content-type: application/json");
echo $dischi_json;
// echo $response_json;
