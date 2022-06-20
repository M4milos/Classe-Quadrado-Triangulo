<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once "../constante/const.php";

class Quadrado{
        
    private $id;
    private $lado = 3;
    private $cor = "#ff0000";
    private $idTabuleiro;
    private static $count = 0;
        
        public function __construct($id, $lado, $cor, $idTabuleiro){
            $this->setId($id);
            $this->setLado($lado);
            $this->setCor($cor);
            $this->setIdtab($idTabuleiro);      
            self::$count += 1;
        }

        public function setId($id){
            if ($id > 0){
                $this->id = $id;
            }
        }
        public function getId(){return $this->id;}

        public function setLado($lado){
            if($lado > 0) {
            $this->lado = $lado;
            }
        }
        public function getLado(){return $this->lado;}

        public function setCor($cor){
            if(strlen($cor) > 0){
                $this->cor = $cor;
            }
        }
        public function getCor(){return $this->cor;}
        
        public function getIdtab(){return $this->idTabuleiro;}

        public function setIdtab($idTabuleiro){
            if($idTabuleiro > 0) {
            $this->idTabuleiro = $idTabuleiro;
            }
        }

        public function Area(){
                return $this->lado * $this->lado;
        }

        public function Perimetro(){
            return $this->lado * Perimetro;
        }

        public function Diagonal(){
            return $this->lado * sqrt(2);
        }

        public function __toString(){
            return  "<h5>[Quadrado] <br>".
                    "ID: ". $this->getId(). "<br>".
                    "Lado: ". $this->getLado() ."<br>".
                    "Cor: ". $this->getCor() ."<br>".
                    "ID Tabuleiro: ". $this->getIdtab()."<br>".
                    "Área: ". $this->Area()."<br>".
                    "Perimetro: ". $this->Perimetro(). "<br>".
                    "Diagonal: ". $this->Diagonal(). "<br>".
                    "Contador: ". self::$count."</h5>";
        }

        public static function Salvar($lado,$cor,$idTab){
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO quadrado (id,lado,cor,idTabuleiro) VALUES (null,:lado, :cor, :idTabuleiro)";
            $salvar = $pdo->prepare($sql);
            $salvar->bindValue(':lado', $lado);
            $salvar->bindValue(':cor', $cor);
            $salvar->bindValue(':idTabuleiro', $idTab);

            if ($salvar->execute()){
                return $pdo->lastInsertId()." Deu boa";
            } else{
                return $salvar->debugDumpParams();
            }
        }

        public static function Listar($tipo = 0, $info = ""){

            $pdo = Conexao::getInstance();

            $sql = 'SELECT * FROM quadrado';
            //adicionar parametros
            if ($tipo > 0) {
                switch ($tipo) {
                    case '1': $sql .= " WHERE ID = :info"; break; 
                    case '2': $sql .= " WHERE lado LIKE :info"; $info .= "%"; break;
                    case '3': $sql .= " WHERE cor like :info"; $info = "%". $info . "%"; break;
                    case '4': $sql .= " WHERE idTabuleiro like :info"; $info = "%". $info . "%"; break;
                }
            }

            $lista = $pdo->prepare($sql);

            if ($tipo > 0) 
                $lista->bindValue(':info',$info, PDO::PARAM_STR);
            
            $lista->execute();

            return $lista->fetchAll();
        }

        public static function Editar($id,$lado,$cor,$idTab){
            $pdo = Conexao::getInstance();
            $sql = "UPDATE quadrado SET lado = :lado, cor = :cor, idTabuleiro = :idTabuleiro WHERE id = :id";
            $editar = $pdo->prepare($sql);
            $editar->bindValue(':lado', $lado, PDO::PARAM_STR);
            $editar->bindValue(':cor', $cor, PDO::PARAM_STR); 
            $editar->bindValue(':id', $id, PDO::PARAM_STR);
            $editar->bindValue(':idTabuleiro', $idTab);
            return $editar->execute();
        }

        public static function Excluir($id){
            $pdo = Conexao::getInstance();
            $excluir = $pdo->prepare('DELETE FROM quadrado WHERE id = :id');
            $excluir->bindValue(':id', $id, PDO::PARAM_STR);
            return $excluir->execute();
        }

        public function desenha(){
            $str = "<center><div style='width: ".$this->getLado()."px; height: ".$this->getLado()."px; background: ".$this->getCor()."'></div></center>";
            
            //$str = $this->getLado();

            return $str;
        }
}

?>