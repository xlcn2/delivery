<?php
session_start();
 
require '../login/init.php';
if (!isLoggedIn())
{
    header('Location: ../index.php');
}

    require 'banco.php';
$pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT id FROM cliente ORDER BY id DESC LIMIT 1";
       $q = $pdo->prepare($sql);
       $q->execute();
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();
       $id = $data['id']+1;


	   $idBairro = $_POST['bairro'];
       $pdo = Banco::conectar();
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT * FROM bairro where id = ?";
       $q = $pdo->prepare($sql);
       $q->execute(array($idBairro));
       $data = $q->fetch(PDO::FETCH_ASSOC);
       $valorEntrega = $data['valorEntrega'];
       $nomeBairro = $data['nome'];
        Banco::desconectar();

    if($_POST){
          $nome = $_POST['nome'];
          $telefone = $_POST['telefone'];
          $endereco = $_POST['rua'].", ".$_POST['numero'];
          $complemento = $_POST['complemento'];
          $referencia = $_POST['referencia'];
         
        
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO cliente (id, nome, telefone, endereco, valorEntrega, bairro, complemento, referencia) VALUES(?,?,?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id, $nome, $telefone, $endereco, $valorEntrega, $nomeBairro, $complemento,$referencia));
            Banco::desconectar();
        
        
        
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "SELECT id FROM cliente ORDER BY id DESC LIMIT 1";
       $q = $pdo->prepare($sql);
       $q->execute();
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();
       $id = $data['id'];
       
            echo"<script>  alert('Cliente cadastrado.');
            window.location.replace('../adicionarPedido.php?id=".$id."');</script>";
            
        
    }
?>