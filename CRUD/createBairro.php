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
       $sql = "SELECT id FROM bairro ORDER BY id DESC LIMIT 1";
       $q = $pdo->prepare($sql);
       $q->execute();
       $data = $q->fetch(PDO::FETCH_ASSOC);
       Banco::desconectar();
       $id = $data['id']+1;
       

    if($_POST){
        $nome = $_POST['nome'];
        $valor1 = $_POST['valor'];
         $valor = $valor = str_replace('.', ',',$valor1);
        
         $source = array('.', ',');
        $replace = array('', '.');
        $valorEntregaFinal = str_replace($source, $replace, $valor); //remove os pontos e substitui a virgula pelo ponto
     
        
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO bairro (id, nome, valorEntrega) VALUES(?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($id, $nome, $valorEntregaFinal));
            Banco::desconectar();
            echo"<script>  alert('Bairro cadastrado.');
            window.location.replace('../bairro.php');</script>";
            
        
    }
?>
