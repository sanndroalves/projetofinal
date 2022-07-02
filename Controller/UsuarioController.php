<?php

    require_once 'Model/Usuario.php';
    class UsuarioController{

        public static function salvar(){
            $usuario = new Usuario;

            $senha1 = $_POST['senha1'];
            $senha2 = $_POST['senha2'];

            if($senha1 == $senha2){
                $usuario->setId($_POST['id']);
                $usuario->setLogin($_POST['login']);
                $usuario->setSenha($senha1);
                $usuario->setPermissao($_POST['permissao']); 
                $usuario->save();
                return true;
            } else{
                return false;
            }
        }

        public static function listar(){
            $usuarios = new Usuario;

            return $usuarios->listAll();
        }

        public static function editar($id){
            $usuario = new Usuario;
            $usuario = $usuario->find($id);

            return $usuario;
        }

        public static function excluir($id){
            $usuario = new Usuario;

            $usuario = $usuario->remove($id);
        }

        public static function logar(){
            $usuario = new Usuario();

            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha']);

            return $usuario->logar();

        }
    }
?>