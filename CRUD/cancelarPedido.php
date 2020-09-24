<?php
session_start();
 
require '../login/init.php';
if (!isLoggedIn())
{
    header('Location: ../index.php');
}

require 'banco.php';

   
  $id = $_REQUEST['id'];
  $idPed = $_REQUEST['idPed'];

    //Delete do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "set @val_max = (select max(id) from pedido WHERE id_pedido = ?);
    DELETE FROM pedido where id = @val_max";
    $q = $pdo->prepare($sql);
    $q->execute(array($idPed));
    Banco::desconectar();

  $pdo = Banco::conectar();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "UPDATE ordem_pedido  set  codigo = null where id_pedido like ".$idPed." ";
  $q = $pdo->prepare($sql);
  $q->execute();
  Banco::desconectar();

  echo"<script>  alert('Pedido Cancelado com Sucesso.');
     window.location.replace('../pedidoRecente.php');</script>";
  
   
    
