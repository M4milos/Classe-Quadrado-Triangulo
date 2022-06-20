<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe Quadrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo.css'>  
    <?php
        require_once "../class/quadrado.class.php";
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado = isset($_POST['lado']) ? $_POST['lado'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idTab = isset($_POST['idTabuleiro']) ? $_POST['idTabuleiro'] : "";

        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 0;
        $info = isset($_POST['info']) ? $_POST['info'] : "";
        
    ?>
    
    <script>
        function Excluir(url){
            if(confirm("Confimar exclusão?"))
            location.href = url;
        }
        
        /*
        function Att(){
            window.location.reload();
        }
        */

    </script>
    </head>
<body>
    <?php
        include "../menu/menu.php";
    ?>
<br>
<fieldset class="teste">
    <center>
        <h3>Criação de quadrados</h3>
    </center>
    <form action="../processa/processa.php" method="POST" class="row g-3">
        <div class="col-md-6">
            <label class="form-label" for="lado">Digite a medida do lado do quadrado: </label>
            <input type="text" class="form-control" id="lado" name="lado">
        </div>
        <div class="col-md-6">
            <label class="form-label"  for="cor">Escolha a cor do quadrado: </label>
            <input type="color" class="form-control" id="cor" name="cor">
        </div>
        <center>
            <div class="col-md-2">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="idTabuleiro">
                    <?php
                        require_once "../utils/operacao.php";
                            echo ListarTabuleiro(0);
                    ?>
                </select>
                <br>
                <input class="btn btn-outline-dark vidro" type="submit" value="Salvar" name="salvar">
            </div>    
        </center>
    </form>
</fieldset>
<fieldset class="teste">
    <form method="post">
        <div>
            <fieldset class="row mb-3">
                <h2>Buscar quadrado</h2>
            <legend class="col-form-label col-sm-2 pt-0"> Pesquisar por: </legend>
                <div class="col-sm-10">
                    <div class="form-check">  
                        <input class="form-check-input" type="radio" name="tipo" value="1" <?php if ($tipo == "1") echo "checked" ?>> 
                        <label class="form-check-label" for="id">
                            ID do quadrado
                        </label>
                    </div>
                    <div class="form-check">      
                        <input class="form-check-input" type="radio" name="tipo" value="2" <?php if ($tipo == "2") echo "checked" ?>> 
                        <label class="form-check-label" for="lado">
                            Tamanho do lado
                        </label>
                    </div>
                    <div class="form-check"> 
                        <input class="form-check-input" type="radio" name="tipo" value="3" <?php if ($tipo == "3") echo "checked" ?>> 
                        <label class="form-check-label" for="cor">
                            Cor do quadrado
                        </label>
                    </div>
                    <div class="form-check"> 
                        <input class="form-check-input" type="radio" name="tipo" value="4" <?php if ($tipo == "4") echo "checked" ?>> 
                        <label class="form-check-label" for="idTabuleiro">
                            ID do tabuleiro
                        </label> 
                    </div>
                    </div>
                <center>
                    <div class="col-md-4"> 
                        <input class="col-md-4 cor" type="text" name="info" id="info" value="<?php echo $info;?>">
                        <input class="btn btn-outline-dark vidro" type="submit" name="procurar" id="procurar">
                    </div>
                </center>
        </div>
    </form>
</fieldset>

<hr>

<fieldset class="teste">
<div class="table-responsive-sm">
    <table border="1px" class="table table-dark table-striped-columns">
        <tr>
            <td>ID</td>
            <td>Lado do quadrado</td>
            <td>Cor do quadrado</td>
            <td>Tabuleiro</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
    <?php
    
        //echo $Quadrado;
        $lista = Quadrado::Listar($tipo,$info);
        //var_dump($lista);
        foreach ($lista as $item) {
            $cor = str_replace('#','%23', $item['Cor']);
        ?>
        
            <tr>
                <td><a href="sqr.php?id=<?php echo $item['ID']?>&lado=<?php echo $item['Lado']?>&cor=<?php echo $cor?>&idTab=<?php echo $item['idTabuleiro']?>"><?php echo $item['ID']; ?></td></a>
                <td><?php echo $item['Lado']; ?></td>
                <td><div style="width: 4vh; height: 4vh; background-color: <?php echo $item['Cor']; ?>;"></div></td>
                <td><?php echo $item['idTabuleiro'] ?></td>
                <td><a href="listar.php?acao=editar&id=<?php echo $item['ID']?>&cor=<?php echo $cor?>&lado=<?php echo $item['Lado']?>&idTabuleiro=<?php echo $item['idTabuleiro']?>">Editar</a></td>
                <td><a href="javascript:Excluir('../processa/processa.php?acao=excluir&id=<?php echo $item['ID']?>')">Excluir</a></td>
            </tr>
        <?php
        }
    ?>
    </table>
    </div>
    </fieldset>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>