<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

ini_set('display_errors',1);
error_reporting(E_ALL);


sendQuery();

function sendQuery(){

    $name = filter_input(INPUT_POST, "name");
    $phone = filter_input(INPUT_POST, "phone");
    $address = filter_input(INPUT_POST, "address");
    $question = filter_input(INPUT_POST, "question");

    $message = "
    <table>

    <tr>
    <td>Nombre:</td>
    <td>$name</td>
    </tr>

    <tr>
    <td>Telefono:</td>
    <td>$phone</td>
    </tr>

    <tr>
    <td>Direccion:</td>
    <td>$address</td>
    </tr>

    <tr>
    <td>Consulta</td>
    <td>$query;</td>
    </tr>

    </table>
    ";

    //cors();
    $output["response"] = $mail("info@cortinascalderon.net", "Consulta Cortinas Calderon", $message)
    header("Content-type: application/json");
    json_encode($output);

}

function cors() {

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }
}