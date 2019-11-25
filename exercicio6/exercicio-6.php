<?php
    include 'Select.php';

    $generos = array(
        array("id"=>1, "descricao"=>"Masculino"),
        array("id"=>2, "descricao"=>"Feminino"),
        array("id"=>3, "descricao"=>"Não-binário"),
        array("id"=>4, "descricao"=>"Outro"),
    );
    
    $genero = new Select();
    $genero->setName('genero');
    $genero->setValue($generos);
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" type="text/css">

        <title>Exercício 4</title>

        <style>
            body{
                font-size: 14px;
            }
            .header{
                font-weight: 300;
                text-align: center;
                width: 100%;
                padding: 34px;
                font-size: 2em;  
            }
            .form-center{
                width: 80%;
                margin: 0 auto;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    </head>
    <body>
    <div class="header">Preencha o formulário abaixo:</div>
    <div class="container form-center">
        <form id="formCadastro" name="formCadastro" action="exercicio-6.php" method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Informe seu Nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Informe seu Email">
            </div>
            <div class="form-group">
                <label for="genero">Gênero</label>
                <?php $genero->makeSelect(); ?>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form> 
    </div>
    <?php 

        if(isset($_POST)){
            ?>
            <div style="margin: 0 auto; " role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-delay="5000" id="msgSucesso" data-autohide="false">
                <div class="toast-header">
                    <strong class="mr-auto">Sucesso!</strong>
                    
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    Os dados foram gravados com sucesso!
                </div>
            </div>
            <script>
                $(document).ready(function($){
                    $('#msgSucesso').toast('show');
                });                
            </script>
            <?php
            unset($_POST);
        }
    ?>
    </body>
</html>