<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe Tabuleiro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo.css'>
    <?php
        require_once "../class/tabuleiro.class.php";

        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado = isset($_POST['lado']) ? $_POST['lado'] : "";

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
        <h3>Criação de tabuleiros</h3>
    </center>
        <form action="../processa/processa2.php" method="POST">
            <div class="col-md">
                <label class="form-label" for="lado">Digite a medida do tabuleiro</label>
                <input type="text" class="form-control" id="tab" name="tab">
            </div>
            <br>
            <center>
                <div class="col-md-2">  
                    <input class="btn btn-outline-dark vidro" type="submit" value="salvar" name="salvar">
                </div>
            </center>
        </form>
    </fieldset>

    <fieldset class="teste">
        <form method="post">
            <fieldset class="row mb-3">
                <h3>Tabuleiro</h3>
                    <legend class="col-form-label col-sm-2 pt-0"> Pesquisar por: </legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" value="1" <?php if ($tipo =="1") echo "checked" ?>>
                                <label class="form-check-label" for="id"> 
                                    ID do tabuleiro 
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="tipo" value="2" <?php if ($tipo =="2") echo "checked" ?>> 
                                <label class="form-check-label" for="tamanho"> 
                                    Tamanho do tabuleiro 
                                </label>
                            </div>
                            </div> 
                        <center>
                            <div class="col-md-4"> 
                                <input class="col-md-4 cor" type="text" name="info" id="info" value="<?php echo $info;?>">
                                <input class="btn btn-outline-dark vidro" type="submit" name="procurar" id="procurar">
                            </div>
                        </center>
        </form>
</fieldset class="teste">
    <div class="table-responsive-sm">
        <table border="1px" class="table table-dark table-striped-columns">
            <tr>
                <td>ID</td>
                <td>Tamanho</td>
                <td>Editar</td>
                <td>Excluir</td>
            </tr>
        <?php
            $tab = new Tabuleiro("","");
            //echo $tab;
            $lista = $tab->Listar($tipo,$info);
            //var_dump($lista);
            foreach ($lista as $item) {
                ?>
            <tr>
                <td><a href="sqr2.php?lado=<?php echo $item['Lado']?>&idTab=<?php echo $item['idTabuleiro']?>"><?php echo $item['idTabuleiro']; ?></td>
                <td><?php echo $item['Lado']?></td>
                <td><a href="listar2.php?acao=editar&id=<?php echo $item['idTabuleiro']?>&lado=<?php echo $item['Lado']?>">Editar</a></td>
                <td><a href="javascript:Excluir('../processa/processa2.php?acao=excluir&id=<?php echo $item['idTabuleiro']?>')">Excluir</a></td>
            </tr>
        <?php    
            }
        ?>
    </table>
</body>
</html>