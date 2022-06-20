<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe Triângulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo.css'>
    <?php
        require_once "../class/triangulo.class.php";

        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $base = isset($_POST['base']) ? $_POST['base'] : "";
        $lado1 = isset($_POST['lado1']) ? $_POST['lado1'] : "";
        $lado2 = isset($_POST['lado2']) ? $_POST['lado2'] : "";

        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 0;
        $info = isset($_POST['info']) ? $_POST['info'] : "";
    ?>
    <script>
    function Excluir(url){
        if(confirm("Confimar exclusão?"))
        location.href = url;
    }
    </script>
</head>
<body>
<?php
        include "../menu/menu.php";
    ?>
<br>
<fieldset class="teste">
    <center>
        <h3>Criação de triângulos</h3>
    </center>
    <form action="../processa/processa4.php" method="POST" class="row g-3">
        <div class="col-md-4">
            <label class="form-label" for="lado1">Digite a medida do lado do triângulo: </label>
            <input type="text" class="form-control" id="lado1" name="lado1">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="lado2">Digite a medida do lado do triângulo: </label>
            <input type="text" class="form-control" id="lado2" name="lado2">
        </div>
        <div class="col-md-4">
            <label class="form-label" for="base">Digite a medida da do triângulo: </label>
            <input type="text" class="form-control" id="base" name="base">
        </div>
        <!-- <div class="col-md-6">
            <label class="form-label"  for="cor">Escolha a cor do quadrado: </label>
            <input type="color" class="form-control" id="cor" name="cor">
        </div> -->
        <center>
            <div class="col-md-2">
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
                <h2>Buscar triângulo</h2>
            <legend class="col-form-label col-sm-2 pt-0"> Pesquisar por: </legend>
                <div class="col-sm-10">
                    <div class="form-check">  
                        <input class="form-check-input" type="radio" name="tipo" value="1" <?php if ($tipo == "1") echo "checked" ?>> 
                        <label class="form-check-label" for="id">
                            ID do triângulo
                        </label>
                    </div>
                    <div class="form-check">      
                        <input class="form-check-input" type="radio" name="tipo" value="2" <?php if ($tipo == "2") echo "checked" ?>> 
                        <label class="form-check-label" for="base">
                            Tamanho da base
                        </label>
                    </div>
                    <div class="form-check"> 
                        <input class="form-check-input" type="radio" name="tipo" value="3" <?php if ($tipo == "3") echo "checked" ?>> 
                        <label class="form-check-label" for="lado1">
                            Tamanho do lado 1
                        </label>
                    </div>
                    <div class="form-check"> 
                        <input class="form-check-input" type="radio" name="tipo" value="4" <?php if ($tipo == "4") echo "checked" ?>> 
                        <label class="form-check-label" for="lado2">
                            Tamanho do lado 2
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
            <td>Base</td>
            <td>Lado esquerdo</td>
            <td>Lado direito</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
    <?php
    
        //echo $Quadrado;
        $lista = Triangulo::Listar($tipo,$info);
        //var_dump($lista);
        foreach ($lista as $item) {
        ?>
        
            <tr>
                <td><a href="tri.php?id=<?php echo $item['ID']?>&lado1=<?php echo $item['lado1']?>&lado2=<?php echo $item['lado2']?>&base=<?php echo $item['base']?>"><?php echo $item['ID']; ?></td></a>
                <td><?php echo $item['base']; ?></td>
                <td><?php echo $item['lado1']; ?></td>
                <td><?php echo $item['lado2']; ?></td>
                <td><a href="listar4.php?acao=editar&id=<?php echo $item['ID']?>&base=<?php echo $item['base']?>&lado1=<?php echo $item['lado1']?>&lado2=<?php echo $item['lado2']?>">Editar</a></td>
                <td><a href="javascript:Excluir('../processa/processa4.php?acao=excluir&id=<?php echo $item['ID']?>')">Excluir</a></td>
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