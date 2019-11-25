<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/config.php';
include_once '../objects/usuario.php';

$config = new FileConfiguration();
$file = $config->fncGetOutputFile();

$usuario = new Usuario($file);

$result = $usuario->read();