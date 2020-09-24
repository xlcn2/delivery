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
        $cpf = $_POST['cpf'];
          $email = $_POST['email'];

          $telefone = $_POST['telefone'];
        
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO motoboy (nome, cpf, email, telefone) VALUES(?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $cpf, $email, $telefone));
            Banco::desconectar();
            echo"<script>  alert('Motoboy cadastrado.');
            window.location.replace('../motoboy.php');</script>";
            
        
    }
?>
