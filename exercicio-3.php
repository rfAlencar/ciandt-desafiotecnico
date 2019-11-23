<?php

function fncReturnExtension($value) {
    return explode(".", $value)[1];
}

function fncExtensions(){
    global $files;

    $extensions = array_map("fncReturnExtension", $files);

    sort($extensions, SORT_STRING);

    foreach($extensions as $key => $value){
        echo $value . "<br>";
    }
    
}

$files = array(
    "music.mp4",
    "video.mov",
    "imagem.jpeg",
    "planilha.xlsx"
);

fncExtensions();
?>