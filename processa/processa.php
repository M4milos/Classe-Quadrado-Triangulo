<?php 
    // if (isset($_GET['acao']) && !empty($_GET['acao']) && isset($_POST['salvar']) && !empty($_POST['salvar']) &&
    // isset($_POST['nome']) && !empty($_POST['nome'])){
    

        require_once "../class/quadrado.class.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

    $editar = isset($_POST['nome']) ? $_POST['nome'] : "";

    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";
    
    if($acao == "excluir"){

        $id = isset($_GET['id']) ? $_GET['id'] : "";
        
        $bah = Quadrado::Excluir($id);
        //echo "excluir";
    }
    if ($editar == "Enviar") {
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado = isset($_POST['lado']) ? $_POST['lado'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idTab = isset($_POST['idTabuleiro']) ? $_POST['idTabuleiro'] : "";

        $bah = Quadrado::Editar($id,$lado,$cor,$idTab);
        //echo $bah;
        //echo "editar";
    }

    if ($salvar == "Salvar") {
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado = isset($_POST['lado']) ? $_POST['lado'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idTab = isset($_POST['idTabuleiro']) ? $_POST['idTabuleiro'] : "";

        $bah = Quadrado::Salvar($lado,$cor,$idTab);
        
        echo $bah;
    }
    
    
    if($bah == true){
        header("location:../index/index.php");
    }
    else{   
        echo "Erro ao executar o salvar";
    }
// }else {
//     header("location:../index/index.php");
// }
?>

