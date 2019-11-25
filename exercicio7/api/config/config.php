<?php

class FileConfiguration {
    private $input = "usuarios.txt";

    public function fncGetOutputFile() {
        return $this->input;
    } 
}