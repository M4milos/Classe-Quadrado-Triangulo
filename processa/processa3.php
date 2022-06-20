<?php
    session_start();
    require "../class/login.class.php";
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    
    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";

    $barbaridade = isset($_POST['editar']) ? $_POST['editar'] : "";

    $logar = isset($_POST['logar']) ? $_POST['logar'] : "";
    
    if ($barbaridade == "Enviar") {
        
        $id = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $log = isset($_POST['log']) ? $_POST['log'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
       
        $bah = Usuario::Editar($id,$nome,$log,$senha);

        if($bah == true):
            header("location:../index/indexUsu.php");
        else:   
            echo "Erro ao executar o editar";
        endif;

        //echo $bah;
        //echo "editar";
    }

    if($acao == "excluir"){

        $id = isset($_GET['id']) ? $_GET['id'] : "";
        
        $bah = Usuario::Excluir($id);

        if($bah == true):
            header("location:../index/indexUsu.php");
        else:   
            echo "Erro ao executar o excluir";
        endif;

        //echo "excluir";
    }
    

    

    if ($salvar == "salvar") {
        $id = isset($_POST['idUsuario']) ? $_POST['idUsuario'] : "";
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $log = isset($_POST['log']) ? $_POST['log'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        //echo $nome;
    
        $bah = Usuario::Salvar($nome,$log,$senha);

        //var_dump($bah);
        if($bah == true):
            header("location:../index/indexUsu.php");
        else:   
            echo "Erro ao executar o salvar";
        endif;
    }
    
    


    if($logar = "logar"){
        $log = isset($_POST['log']) ? $_POST['log'] : "";
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

        $usuario = new Usuario("","",$log,$senha);
        
        if($usuario->efetuaLogin($log,$senha) == true ):
                header("location:../index/indexUsu.php");
        else:
            header("location:../index.php");
            exit;
        endif;
    }

?>