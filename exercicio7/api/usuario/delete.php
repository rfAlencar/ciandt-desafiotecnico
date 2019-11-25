<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/config.php';
include_once '../objects/usuario.php';

$config = new FileConfiguration();
$file = $config->fncGetOutputFile();

$usuario = new Usuario($file);

$data = json_decode(file_get_contents("php://input"));
 
if(!empty($data->email)){
    $usuario->email = $data->email;
 
    if($usuario->delete()){
        // set response code - 200 executed
        http_response_code(200);
        echo json_encode(array("message" => "Usuário deletado com sucesso."));
    } else {
        // set response code - 503 service unavailable
        http_response_code(503);
        echo json_encode(array("message" => "Não foi possível deletar o usuário: erro desconhecido."));
    }
} else {
    // set response code - 400 bad request
    http_response_code(400);
    echo json_encode(array("message" => "Não foi possível deletar o usuário: dados inválidos.", "data" => $data));
}
?>