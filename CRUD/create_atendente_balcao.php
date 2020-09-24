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
        $codigo = $_POST['codigo'];
        
        
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO atendente_balcao (nome, codigo) VALUES(?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome, $codigo));
            Banco::desconectar();
            echo"<script>  alert('Atendente cadastrado.');
            window.location.replace('../atendente_balcao.php');</script>";
            
        
    }
?>
