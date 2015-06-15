<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

//Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

sendQuery();

function sendQuery(){

    $data = json_decode(file_get_contents("php://input"), true);

    $body = "
    <table>

    <tr>
    <td>Nombre:</td>
    <td>" . $data["name"] . "</td>
    </tr>

    <tr>
    <td>Telefono:</td>
    <td>" . $data["phone"] . "</td>
    </tr>

    <tr>
    <td>Direccion:</td>
    <td>" . $data["email"] ."</td>
    </tr>

    <tr>
    <td>Consulta:</td>
    <td>" . $data["message"] . "</td>
    </tr>

    </table>
    ";

    $output["response"] = mail("miccalsa@gmail.com", "Consulta Cortinas Calderon", $body, "Content-Type: text/html; charset=ISO-8859-1\r\n");
    header("Content-type: application/json");
    return json_encode($output);

}
