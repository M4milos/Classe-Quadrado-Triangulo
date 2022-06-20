<?php
require_once('based.class.php');
class Triangulo extends Based{
    private $base;
    private $lado1;
    private $lado2;

    public function __construct($id,$cor,$tabuleiro,$base,$lado1,$lado2){
        parent::__construct($id,$cor,$tabuleiro);
        $this->setBase($base);
        $this->setLado1($lado1);
        $this->setLado2($lado2);
    }
    public function setBase($base){
        if($base > 0) {
        $this->base = $base;
        }
    }
    public function getBase(){return $this->base;}

    public function setLado1($lado1){
        if($lado1 > 0) {
        $this->lado1 = $lado1;
        }
    }
    public function getLado1(){return $this->lado1;}

    public function setLado2($lado2){
        if($lado2 > 0) {
        $this->lado2 = $lado2;
        }
    }
    public function getLado2(){return $this->lado2;}

    public function Desenha(){
        return "<div style='width: 0;  height: 0;  border-left: ".$this->getBase()."px solid transparent; border-right: ".$this->getLado1()."px solid transparent; border-bottom: ".$this->getLado1()."px solid violet;'></div>";
    }

    public function AchaTriangulo(){
        if ($this->getBase() == $this->getLado1() && $this->getLado1() == $this->getLado2()) {
            return "Triângulo equilátero";
        }elseif ($this->getBase() != $this->getLado1() && $this->getBase() != $this->getLado2() && $this->getLado1() != $this->getLado2()) {
            return "Triâgulo escaleno";
        }else{
            return "Triângulo isóceles";
        }
    }

    public static function Salvar($base,$lado1,$lado2){
        $pdo = Conexao::getInstance();
        $sql = "INSERT INTO triangulo (base, lado1, lado2) VALUES (:base, :lado1, :lado2)";
        $salvar = $pdo->prepare($sql);
        $salvar->bindValue(':base', $base);
        $salvar->bindValue(':lado1', $lado1);
        $salvar->bindValue(':lado2', $lado2);

        if ($salvar->execute()){
            return $pdo->lastInsertId()." Deu boa";
        } else{
            return $salvar->debugDumpParams();
        }
    }

    public static function Listar($tipo = 0, $info = ""){

        $pdo = Conexao::getInstance();

        $sql = 'SELECT * FROM triangulo';
        //adicionar parametros
        if ($tipo > 0) {
            switch ($tipo) {
                case '1': $sql .= " WHERE ID = :info"; break; 
                case '2': $sql .= " WHERE base LIKE :info"; $info .= "%"; break;
                case '3': $sql .= " WHERE lado1 LIKE :info"; $info .= "%"; break;
                case '4': $sql .= " WHERE lado2 LIKE :info"; $info .= "%"; break;
            }
        }

        $lista = $pdo->prepare($sql);

        if ($tipo > 0) 
            $lista->bindValue(':info',$info, PDO::PARAM_STR);
        
        $lista->execute();

        return $lista->fetchAll();
    }

    public static function Editar($id,$lado1,$lado2,$base){
        $pdo = Conexao::getInstance();
        $sql = "UPDATE triangulo SET lado1 = :lado1, lado2 = :lado2, base = :base WHERE id = :id";
        $editar = $pdo->prepare($sql);
        $editar->bindValue(':lado1', $lado1, PDO::PARAM_STR);
        $editar->bindValue(':lado2', $lado2, PDO::PARAM_STR); 
        $editar->bindValue(':id', $id, PDO::PARAM_STR);
        $editar->bindValue(':base', $base, PDO::PARAM_STR);
        return $editar->execute();
    }

    public static function Excluir($id){
        $pdo = Conexao::getInstance();
        $excluir = $pdo->prepare('DELETE FROM triangulo WHERE id = :id');
        $excluir->bindValue(':id', $id, PDO::PARAM_STR);
        return $excluir->execute();
    }

    public function __toString(){
        $str = parent::__toString();
        $str .= "<h5>[Triângulo] <br>".
                "Base: ". $this->getBase(). "<br>".
                "Lado esquerdo: ". $this->getLado1(). "<br>".
                "Lado direito: ". $this->getLado2(). "<br>".
                "Tipo de triângulo: ". $this->AchaTriangulo(). "<br>";
        return $str;
    }
}

// $id,$cor,$tabuleiro,$base,$altura,$lado1,$lado2

// $tri = new Triangulo(1,'green',1,100,50,100,100);


// //var_dump($tri);

// echo $tri;

?>