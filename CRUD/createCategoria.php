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
       $sql = "SELECT id FROM categoria ORDER BY id DESC LIMIT 1";
       $q = $pdo->prepare($sql);
       $q->execute();
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();
       $id = $data['id']+1;
       

    if($_POST){
        $nome = $_POST['nome'];
        
        
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO categoria (id, nome) VALUES(?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id, $nome));
            Banco::desconectar();
            echo"<script>  alert('Categoria cadastrada.');
            window.location.replace('../categoria.php');</script>";
            
        
    }
?>
