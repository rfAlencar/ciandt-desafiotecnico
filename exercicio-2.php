<?php

function foiMordido() {
    return rand(0, 1) < 0.5 ? true : false;
}

function fncBittenOrNot() {
    if (foiMordido()) {
        echo "Joãozinho mordeu o seu dedo!";
    } else {
        echo "Joãozinho NÃO mordeu o seu dedo!";
    }
}

fncBittenOrNot();

?>