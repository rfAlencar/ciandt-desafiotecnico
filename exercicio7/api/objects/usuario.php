<?php

class Usuario {
    private $file;

    public $nome;
    public $sobrenome;
    public $email;
    public $telefone;

    public function __construct($file){
        $this->file = $file;
    }

    function read(){
        $usuarios = array();
        $usuarios["records"]=array();

        if(!filesize($this->file)){
            // set response code - 404 Not found
            http_response_code(404);
        
            echo json_encode(
                array("message" => "Nenhum usuário encontrado.")
            );
        }
    
        $handle = fopen($this->file, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $arr = explode(";", $line);

                $usuario_array = array(
                    "nome" => $arr[0],
                    "sobrenome" => $arr[1],
                    "email" => $arr[2],
                    "telefone" => str_replace('\n', '', $arr[3])
                );

                array_push($usuarios["records"], $usuario_array);

            }

            fclose($handle);
        } else {
            die("Erro: não foi possível abrir o arquivo.");
        } 

        // set response code - 200 OK
        http_response_code(200);
    
        // show products data in json format
        echo json_encode($usuarios);
        
    }

    function create(){
        $string = $this->nome . ";" . 
        $this->sobrenome . ";" . 
        $this->email . ";" . 
        $this->telefone . "\n";

        if(file_put_contents($this->file, $string, FILE_APPEND)){
            return true;
        } else {
            return false;
        }        
    }

    function update(){
        $usuarios = array();
        $usuarios["records"]=array();

        $string = $this->nome . ";" . 
        $this->sobrenome . ";" . 
        $this->email . ";" . 
        $this->telefone . "\n";

        if(!filesize($this->file)){
            // set response code - 404 Not found
            http_response_code(404);
        
            echo json_encode(
                array("message" => "Nenhum usuário encontrado.")
            );
        }
    
        $handle = fopen($this->file, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $arr = explode(";", $line);

                if ($this->email != $arr[2]) {
                    $usuario_array = array(
                        "nome" => $arr[0],
                        "sobrenome" => $arr[1],
                        "email" => $arr[2],
                        "telefone" => $arr[3]
                    );

                    array_push($usuarios["records"], $usuario_array);
                }
            }

            fclose($handle);

            unlink($this->file);

            foreach($usuarios["records"] as $item){
                file_put_contents($this->file, implode(";", $item), FILE_APPEND);
            }
        } else {
            die("Erro: não foi possível abrir o arquivo.");
        } 

        if(file_put_contents($this->file, $string, FILE_APPEND)){
            return true;
        } else {
            return false;
        }        
    }

    function delete(){
        $usuarios = array();
        $usuarios["records"]=array();

       if(!filesize($this->file)){
            // set response code - 404 Not found
            http_response_code(404);
        
            echo json_encode(
                array("message" => "Nenhum usuário encontrado.")
            );
        }
    
        $handle = fopen($this->file, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $arr = explode(";", $line);

                if ($this->email != $arr[2]) {
                    $usuario_array = array(
                        "nome" => $arr[0],
                        "sobrenome" => $arr[1],
                        "email" => $arr[2],
                        "telefone" => $arr[3]
                    );

                    array_push($usuarios["records"], $usuario_array);
                }
            }

            fclose($handle);

            unlink($this->file);

            foreach($usuarios["records"] as $item){
                file_put_contents($this->file, implode(";", $item), FILE_APPEND);
            }
        } else {
            die("Erro: não foi possível abrir o arquivo.");
        } 

        return true;
    }
}