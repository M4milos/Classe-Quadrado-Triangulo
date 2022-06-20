<?php 
    // if (isset($_GET['acao']) && !empty($_GET['acao']) && isset($_POST['salvar']) && !empty($_POST['salvar']) &&
    // isset($_POST['nome']) && !empty($_POST['nome'])){
    

        require_once "../class/triangulo.class.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

    $editar = isset($_POST['nome']) ? $_POST['nome'] : "";

    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";
    
    if($acao == "excluir"){

        $id = isset($_GET['id']) ? $_GET['id'] : "";
        
        $bah = Triangulo::Excluir($id);
        //echo "excluir";
    }
    if ($editar == "Enviar") {
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado1 = isset($_POST['lado1']) ? $_POST['lado1'] : "";
        $lado2 = isset($_POST['lado2']) ? $_POST['lado2'] : "";
        $base = isset($_POST['base']) ? $_POST['base'] : "";

        $bah = Triangulo::Editar($id,$lado1,$lado2,$base);
        //echo $bah;
        //echo "editar";
    }

    if ($salvar == "Salvar") {
        $lado1 = isset($_POST['lado1']) ? $_POST['lado1'] : "";
        $lado2 = isset($_POST['lado2']) ? $_POST['lado2'] : "";
        $base = isset($_POST['base']) ? $_POST['base'] : "";

        $bah = Triangulo::Salvar($base,$lado2,$lado1);
        
        echo $bah;
    }
    
    
    if($bah == true){
        header("location:../index/indexTri.php");
    }
    else{   
        echo "Erro ao executar o salvar";
    }
// }else {
//     header("location:../index/index.php");
// }
?>

