<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    include_once "../constante/const.php";
    class Usuario{
        private $id;
        private $nome;
        private $login;
        private $senha;
        private static $cont = 0;

        public function __construct($id, $nome, $login, $senha){
            $this->setId($id);
            $this->setNome($nome);
            $this->setLogin($login);
            $this->setSenha($senha);
            self::$cont += 1;      
        }

        public function setId($id){
            if ($id > 0){
                $this->id = $id;
            }
        }
        public function getId(){return $this->id;}

        public function setNome($nome){
            if($nome != "") {
                $this->nome = $nome;
            }
        }
        public function getNome(){return $this->nome;}

        public function setLogin($login){
            if($login != ""){
                $this->login = $login;
            }
        }
        public function getLogin(){return $this->login;}

        public function setSenha($senha){
            if ($senha != "") {
                $this->senha = $senha;
            }
        }
        public function getSenha(){return $this->senha;}

        public static function Listar($tipo = 0, $info = "" ){

            $pdo = Conexao::getInstance();

            $sql = 'SELECT * FROM usuario';
            //adicionar parametros
            if ($tipo > 0) {
                switch ($tipo) {
                    case '1': $sql .= " WHERE idUsuario = :info"; break; 
                    case '2': $sql .= " WHERE nome LIKE :info"; $info .= "%"; break;
                    case '3': $sql .= " WHERE login LIKE :info"; $info .= "%"; break;
                }
            }

            $lista = $pdo->prepare($sql);

            if ($tipo > 0) 
                $lista->bindValue(':info',$info, PDO::PARAM_STR);
            
            $lista->execute();

            return $lista->fetchAll();

        }

        public static function Salvar($nome,$logn,$senha){
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO usuario (idUsuario, nome ,login,senha) VALUES (null, :nome, :logn, :senha)";
            $inserir = $pdo->prepare($sql);
            $inserir->bindValue(':nome', $nome);
            $inserir->bindValue(':logn', $logn);
            $inserir->bindValue(':senha', $senha);

            if ($inserir->execute()){
                return $pdo->lastInsertId()." Item salvo <br>";
            } else{
                return $inserir->debugDumpParams();
            }
        }

        public static function Excluir($id){
            $pdo = Conexao::getInstance();
            $excluir = $pdo->prepare('DELETE FROM usuario WHERE idUsuario = :id');
            $excluir->bindValue(':id', $id, PDO::PARAM_STR);
            if ($excluir->execute()){
                return $pdo->lastInsertId()." Item excluido";
            } else{
                return $excluir->debugDumpParams();
            }
        }

        public static function Editar($id,$nome,$log,$senha){
            $pdo = Conexao::getInstance();
            $sql = "UPDATE Usuario SET nome = :nome, login = :login, senha = :senha WHERE idUsuario = :idusuario";
            $editar = $pdo->prepare($sql);
            $editar->bindValue(':nome', $nome, PDO::PARAM_STR);
            $editar->bindValue(':login', $log, PDO::PARAM_STR);
            $editar->bindValue(':senha', $senha, PDO::PARAM_STR);
            $editar->bindValue(':idusuario', $id, PDO::PARAM_STR);
            return $editar->execute();
        }

        public function __toString(){
            return  "[USUARIO]<br>".
                    "ID: ".$this->getId()."<br>".
                    "Nome: ". $this->getNome()."<br>".
                    "Login: ". $this->getLogin()."<br>".
                    "Senha: ".$this->getSenha()."<br>";
        }

        public static function efetuaLogin($login, $senha){
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
            $logar = $pdo->prepare($sql);
            $logar->bindValue(':login', $login);
            $logar->bindValue(':senha', $senha);
            $logar->execute();
            //$teste = $logar->fetchAll(PDO::FETCH_ASSOC); 

            //var_dump($teste);
            
            if ($logar->rowCount() > 0){
                $dado = $logar->fetch();

                $_SESSION['Usuario'] = $dado['login'];

                return true;
            } else{
                return false;
            }
        }
    }

?>