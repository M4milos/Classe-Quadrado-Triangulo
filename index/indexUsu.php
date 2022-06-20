<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo.css'>
    <?php
        require_once "../class/login.class.php";
        
        //echo $_SESSION['Usuario'];
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $log = isset($_POST['log']) ? $_POST['log'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

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
        <h3>Registro de usuário</h3>
    </center>
        <form action="../processa/processa3.php" method="POST">
            <div class="col-md">
                <label class="form-label" for="nome">Digite seu nome de usuario: </label>
                <input type="text" class="form-control" name="nome" id="nome">
            </div>
            <div class="col-md">
                <label class="form-label" for="login">Digite o nome de login: </label>
                <input type="text" class="form-control" name="log" id="log">
            </div>
            <div class="col-md">
                <label class="form-label" for="senha">Digite sua senha: </label>
                <input type="password" class="form-control" name="senha" id="senha">
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
                <h3>Usuarios</h3>
                    <legend class="col-form-label col-sm-2 pt-0"> Pesquisar por: </legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="radio" name="tipo" value="1" <?php if ($tipo =="1") echo "checked" ?>>
                                <label class="form-check-label" for="id">
                                    ID do usuário
                            </div>
                            <div class="form-check">
                                <input type="radio" name="tipo" value="2" <?php if ($tipo =="2") echo "checked" ?>>
                                <label class="form-check-label" for="id">
                                    Nome do usuário
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="tipo" value="3" <?php if ($tipo =="3") echo "checked" ?>>
                                <label class="form-check-label" for="id">
                                    Nome do login  
                            </label>
                            </div>
                        </div>
                        <center>
                            <div class="col-md-4"> 
                                <input class="col-md-4 cor" type="text" name="info" id="info" value="<?php echo $info;?>">
                                <input type="submit" class="btn btn-outline-dark vidro" name="procurar" id="procurar" > 
                            </div>
                        </center>
        </form>

</fieldset>
    <div class="table-responsive-sm">
            <table border="1px" class="table table-dark table-striped-columns">
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Login</td>
                    <td>Senha</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
        <?php
            $lista = Usuario::Listar($tipo,$info);
            //var_dump($lista);
            foreach ($lista as $item) {
                $a = sha1($item['senha']);
                ?>
            <tr>
                <td><?php echo $item['idUsuario']; ?></td>
                <td><?php echo $item['nome']?></td>
                <td><?php echo $item['login']?></td>
                <td><?php echo $a?></td>
                <td><a href="listar3.php?acao=editar&id=<?php echo $item['idUsuario']?>&nome=<?php echo $item['nome']?>&login=<?php echo $item['login']?>&senha=<?php echo $item['senha']?>">Editar</a></td>
                <td><a href="javascript:Excluir('../processa/processa3.php?acao=excluir&id=<?php echo $item['idUsuario']?>')">Excluir</a></td>
            </tr>
        <?php    
            }
        ?>
    </table>
</body>
</html>