<?php 
    // if (isset($_GET['acao']) && !empty($_GET['acao']) && isset($_POST['salvar']) && !empty($_POST['salvar']) &&
    // isset($_POST['nome']) && !empty($_POST['nome'])){

    require_once "../class/tabuleiro.class.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    
    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";

    $editar = isset($_POST['nome']) ? $_POST['nome'] : "";
    
    if($acao == "excluir"){

        $id = isset($_GET['id']) ? $_GET['id'] : "";
        
        $bah = Tabuleiro::Excluir($id);


        //echo "excluir";
    }
    
    if ($editar == "Editar") {
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado = isset($_POST['lado']) ? $_POST['lado'] : "";
        /*
        echo "ID".$id."<br>".
         "tab: ".$tab."<br>". 
        "Cor: ". $cor;
        */
        $bah = Tabuleiro::Editar($id,$lado);

        // echo "Entrou <br> ID: ".$id."Lado: ". $lado;

        //echo $bah;
        //echo "editar";
    }

    

    if ($salvar == "salvar") {
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $tab = isset($_POST['tab']) ? $_POST['tab'] : "";

        $bah = Tabuleiro::Salvar($tab);

        var_dump($bah);
    }
    
    // if ($tche == true) {
    //     header("location:../index/indexTab.php");
    // }
    // else{
    //     echo "Por favor exclua a chave estrangeira primeiro";
    // }

    if($bah == true){
        header("location:../index/indexTab.php");
    }
    else{   
        echo "Erro ao executar o salvar";
    }
// }
// else{
//     header("location:../index/indexTab.php");
// }
?>
