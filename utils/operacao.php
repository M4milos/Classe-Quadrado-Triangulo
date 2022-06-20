<?php

    require_once("../class/tabuleiro.class.php");

    function Exibir($chave, $dado, $selecao = 0){
        $str = "<option value=0>Selecione</option>";
        $check="";
        foreach($dado as $linha){
            if($selecao > 0 && $linha[$chave[0]] == $selecao){
                $check = "selected";
            }
            $str .= "<option ".$check." value='".$linha[$chave[0]]."'>ID: ".$linha[$chave[0]]." Lado: ".$linha[$chave[1]]."</option>";
            $check = "";
        }
        return $str;
    }

    function ListarTabuleiro($selecao){
        $lista = Tabuleiro::Listar();
        var_dump($lista);
        return Exibir(array('idTabuleiro','Lado'),$lista, $selecao);
    }
?>