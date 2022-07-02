<?php

    require_once 'Banco.php';
    require_once 'Conexao.php';


    class Usuario extends Banco{

        private $id;
        private $login;
        private $senha;
        private $permissao;

        //GETS E SETS
        public function getId(){
                return $this->id;
        }

        public function setId($id){
                $this->id = $id;
        }

        public function getLogin(){
                return $this->login;
        }

        public function setLogin($login){
                $this->login = $login;
        }

        public function getSenha(){
                return $this->senha;
        }

        public function setSenha($senha){
                $this->senha = md5($senha);
        }

        public function getPermissao(){
                return $this->permissao;
        }

        public function setPermissao($permissao){
                $this->permissao = $permissao;
        }

        


        //METODOS
        public function save(){
                $result = false;
                $conexao = new Conexao();

                if($conn = $conexao->getConection()){
                        if($this->id > 0){

                                $query = "UPDATE usuario SET login = :login, senha = :senha, permissao = :permissao WHERE id = :id";
                                $stmt = $conn->prepare($query);
                                if($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao' => $this->permissao, ':id' => $this->id))){
                                        $result = $stmt->rowCount();
                                }

                        }else{
                           $query = "insert into usuario (id, login, senha, permissao) VALUES (null, :login, :senha, :permissao)"; 
                           $stmt = $conn->prepare($query);   
                           if($stmt->execute(array(':login' => $this->login, ':senha' => $this->senha, ':permissao' => $this->permissao))){
                                $result = $stmt->rowCount();
                                }
                        }
                }
        return $result;
        }
        
        public function remove($id){
                $result = false;

                $conexao = new Conexao();
                $conn = $conexao->getConection();
                $query = "DELETE FROM usuario WHERE id = :id";
                $stmt = $conn->prepare($query);
                if($stmt->execute(array(':id' => $id))){
                        $result = true;
                }
                return $result;
        }
        public function find($id){
                $conexao = new Conexao();
                $conn = $conexao->getConection();
                $query = "SELECT * FROM usuario WHERE id = :id";

                $stmt = $conn->prepare($query);
                if($stmt->execute(Array(':id' => $id))){
                        if($stmt->rowCount() > 0){
                                $result = $stmt->fetchObject(Usuario::class);
                        }else{
                                $result = false;
                        }
                }
                return $result;
        }
        public function count(){}
        public function listAll(){
                $conexao = new Conexao();
                $conn = $conexao->getConection();
                $query = "SELECT * FROM usuario";
                $stmt = $conn->prepare($query);
                $result = array();

                if($stmt->execute()){
                        while($rs = $stmt->fetchObject(Usuario::class)){
                                $result[] = $rs;
                        }
                }else{
                        $result = false;
                }
        return $result;
        }

        public function logar(){
                $conexao = new Conexao();
                $conn = $conexao->getConection();
                $query = "SELECT * FROM usuario WHERE login = :login and senha = :senha";
                $stmt = $conn->prepare($query);

                if($stmt->execute(array(':login'=> $this->login, ':senha'=> $this->senha))){
                        if($stmt->rowCount() > 0){
                                $result = true;
                        }else{
                                $result = false;
                        }
                }
                return $result;
        }

    }
?>