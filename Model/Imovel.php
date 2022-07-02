<?php

    require_once 'Banco.php';
    require_once 'Conexao.php';


    class Imovel extends Banco{

        private $id;
        private $descricao;
        private $foto;
        private $valor;
        private $tipo;

        //GETS E SETS
        //ID
        public function getId(){
                return $this->id;
        }
        public function setId($id){
                $this->id = $id;
        }

        //DESC
        public function getDescricao(){
                return $this->descricao;
        }
        public function setDescricao($descricao){
                $this->descricao = $descricao;

        }

        //FOTO
        public function getFoto(){
                return $this->foto;
        }
        public function setFoto($foto){
                $this->foto = $foto;
        }

        //VALOR
        public function getValor(){
                return $this->valor;
        }
        public function setValor($valor){
                $this->valor = $valor;
        }

        //TIPO
        public function getTipo(){
                return $this->tipo;
        }
        public function setTipo($tipo){
                $this->tipo = $tipo;     
        }


        //METODOS
        public function save(){
                $result = false;
                $conexao = new Conexao();

                if($conn = $conexao->getConection()){
                        if($this->id > 0){
                                $query = "UPDATE imovel SET descricao = :descricao, valor = :valor, tipo = :tipo WHERE id = :id";
                                $stmt = $conn->prepare($query);
                                if($stmt->execute(array(':descricao' => $this->descricao, ':valor' => $this->valor, 'tipo' => $this->tipo , ':id' => $this->id))){
                                        $result = $stmt->rowCount();
                                }
                        }else{
                                $foto = $this->getFoto();

                                $error = array();
                                // Verifica se o arquivo é uma imagem
                                if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
                                        $error[1] = "Isso não é uma imagem.";
                                } 

                                if (count($error) == 0) {
                                        // Pega extensão da imagem
                                        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

                                        // Gera um nome único para a imagem
                                        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

                                        // Caminho de onde ficará a imagem
                                        $caminho_imagem = "model/img/" . $nome_imagem;

                                        // Faz o upload da imagem para seu respectivo caminho
                                        if(move_uploaded_file($foto["tmp_name"], $caminho_imagem)){

                                                $query = "insert into imovel (id, descricao, foto, valor, tipo) VALUES (null, :descricao, :foto, :valor, :tipo)";
                                                if($conn = $conexao->getConection()){
                                                        $stmt = $conn->prepare($query);
                                                        if($stmt->execute(array(':descricao' => $this->descricao, ':foto' => $nome_imagem, ':valor' => $this->valor, ':tipo' => $this->tipo))){
                                                                $result = $stmt->rowCount();
                                                        }
                                                }  
                                        }else{
                                                $result = false;
                                        }
                                        
                                }
                        }
                }


                
        return $result;
        }
        
        public function remove($id){
                $result = false;

                $conexao = new Conexao();
                $conn = $conexao->getConection();
                $query = "DELETE FROM imovel WHERE id = :id";
                $stmt = $conn->prepare($query);
                        if($stmt->execute(array(':id' => $id))){
                                $result = true;
                        }
                return $result;
        }

        public function find($id){
                $conexao = new Conexao();
                $conn = $conexao->getConection();
                $query = "SELECT * FROM imovel WHERE id = :id";

                $stmt = $conn->prepare($query);
                if($stmt->execute(Array(':id' => $id))){
                        if($stmt->rowCount() > 0){
                                $result = $stmt->fetchObject(Imovel::class);
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
                $query = "SELECT * FROM imovel";
                $stmt = $conn->prepare($query);
                $result = array();

                if($stmt->execute()){
                        while($rs = $stmt->fetchObject(Imovel::class)){
                                $result[] = $rs;
                        }
                }else{
                        $result = false;
                }
        return $result;
        }
    }
?>