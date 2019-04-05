<?php

    class UsuarioDao{
        
        private $conex;
        public function __construct(){
            require_once('model/usuarioClass.php');
            require_once('model/dao/conexaoMysql.php');
            $this->conex = new  conexaoMysql();
        }

        public function insert($usuario){
           
            $sql = "INSERT INTO tbl_usuario_cms(nome_usuario_cms,email_usuario_cms,senha,id_niveis)".
                   "values('". $usuario->getNome() ."','". $usuario->getEmail() ."',".
                   "'". $usuario->getSenha() ."',". $usuario->getNivel() ." )";
            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Insert com sucesso";
            }else{
                echo "Erro no script de insert";
            }
            $this->conex->close_database();
        }

        public function delete($id){
            $sql = " DELETE FROM tbl_usuario_cms where id_usuario_cms = $id ";

            $PDO_conex = $this->conex->connect_database();


            if($PDO_conex->query($sql)){
                   echo "Usuario deletado com sucesso";
            } else {
                    echo "Usuario não encontrado!! $sql";
                    return 0;
            }
        }

        public function update($usuario){
             
             $sql = "UPDATE tbl_usuario_cms SET nome_usuario_cms = '" . $usuario->getNome() . "',".
                    "email_usuario_cms= '" . $usuario->getEmail() . "',senha = '" . $usuario->getSenha() . "',id_niveis =" .  $usuario->getNivel() ." ".
                    "WHERE id_usuario_cms = " .  $usuario->getId() . " ";
                          
            //Abrido conexao com o BD
            $PDO_conex = $this->conex->connect_database();

            if($PDO_conex->query($sql)){
                echo "Update com sucesso";
            }else{
                echo "Erro no script de update $sql";
            }
            $this->conex->close_database();
        }
        
        public function selectAll(){
            $sql = " SELECT * FROM tbl_usuario_cms";
            
            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);
               
            $cont = 0;
            //Carregar todos os dados que estão no banco e guardando dentro
            //de um array local
            while($rs_usuario = $select->fetch(PDO::FETCH_ASSOC)){

                $listar_usuarios[] = new Usuario();
                $listar_usuarios[$cont]->setId($rs_usuario['id_usuario_cms']);
                $listar_usuarios[$cont]->setNome($rs_usuario['nome_usuario_cms']);
                $listar_usuarios[$cont]->setEmail($rs_usuario['email_usuario_cms']);
                $listar_usuarios[$cont]->setSenha($rs_usuario['senha']);
                $listar_usuarios[$cont]->setNivel($rs_usuario['id_niveis']);

                $cont+=1;
                
            }
        
            $this->conex->close_database();

            return $listar_usuarios;

        }
        public function selectById($id){

            

            $sql = " SELECT * FROM tbl_usuario_cms where id_usuario_cms = $id ";
            
           

            $PDO_conex = $this->conex->connect_database();

            $select = $PDO_conex->query($sql);

            if($rs_usuario = $select->fetch(PDO::FETCH_ASSOC)){

                $usuario= new Usuario();
                $usuario->setId($rs_usuario['id_usuario_cms'])
                        ->setNome($rs_usuario['nome_usuario_cms'])
                        ->setEmail($rs_usuario['email_usuario_cms'])
                        ->setSenha($rs_usuario['senha'])
                        ->setNivel($rs_usuario['id_niveis']);
                return $usuario;

            } else {
                    echo "Usuario não encontrado!!";
                    return 0;
            }

        }

    }

?>