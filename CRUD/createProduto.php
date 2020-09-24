<?php
session_start();
 
require '../login/init.php';
if (!isLoggedIn())
{
    header('Location: ../index.php');
}

    require 'banco.php';

   
       
       

    if($_POST){
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor1 =  $_POST['valor'];
         $categoria =  $_POST['categoria'];
        $id = $_POST['codigo'];
        
         $valor = $valor = str_replace('.', ',',$valor1);
        
         $source = array('.', ',');
        $replace = array('', '.');
        $valorfinal = str_replace($source, $replace, $valor); //remove os pontos e substitui a virgula pelo ponto
     
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO lanche (id, nome, descricao, valor, categoria) VALUES(?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id, $nome, $descricao, $valorfinal, $categoria));
            Banco::desconectar();
            echo"<script>  alert('Produto cadastrado.');
            window.location.replace('../produto.php');</script>";
            
        
    }
?>
