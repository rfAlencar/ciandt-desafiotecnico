<?php

function fncListLocations() {
    global $location;
    array_multisort(array_column($location, 'capital'), SORT_ASC, $location);

    foreach($location as $key => $linha){
        echo "A capital d" . $linha["termination"] . " " . $linha["country"]  . " é " . $linha["capital"]."<br>";
    }
}

$location = array(
    array("country" => "EUA", "capital" => "Washington", "termination" => "os"),
    array("country" => "Espanha", "capital" => "Madrid", "termination" => "a"),
    array("country" => "Coréia do Sul", "capital" => "Seoul", "termination" => "a"),
    array("country" => "Finlândia", "capital" => "Helsinque", "termination" => "a"),
    array("country" => "Brasil", "capital" => "Brasília", "termination" => "o"),
);


fncListLocations();

?>