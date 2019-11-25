<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/config.php';
include_once '../objects/usuario.php';

$config = new FileConfiguration();
$file = $config->fncGetOutputFile();

$usuario = new Usuario($file);

$data = json_decode(file_get_contents("php://input"));
 
if(!empty($data->nome) && !empty($data->sobrenome) &&
    !empty($data->telefone) && !empty($data->email)){
 
    $usuario->nome = $data->nome;
    $usuario->sobrenome = $data->sobrenome;
    $usuario->telefone = $data->telefone;
    $usuario->email = $data->email;
 
    if($usuario->create()){
        // set response code - 201 created
        http_response_code(201);
        echo json_encode(array("message" => "Usuário criado com sucesso."));
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível criar o usuário: erro desconhecido."));
    }
} else {
    // set response code - 400 bad request
    http_response_code(400);
    echo json_encode(array("message" => "Não foi possível criar o usuário: dados inválidos.", "data" => $data));
}
?>