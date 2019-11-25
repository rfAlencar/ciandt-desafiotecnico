<?php
$file = "answers.txt";
$message = "";

function fncCloseFile() {
    global $file;
    fclose($file) or die("Não foi possível fechar o arquivo!");

    return true;
}

function main() {
    global $file;
    global $message;

    $_POST["senha"] = MD5($_POST["senha"]);

    $answer = implode(";", $_POST)."\n";

    if(!file_put_contents($file, $answer, FILE_APPEND)){
        $message = "Não foi possível cadastrar seu usuário.";
    
    } else {
        $message = "Usuário cadastrado com sucesso!";
    }

    fncCloseFile();

}

main();


?>
<script>
    alert('<?= $message; ?>');
    location.href = ('exercicio-4.html');
</script>
