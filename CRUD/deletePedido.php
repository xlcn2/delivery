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
    $sql = "DELETE FROM pedidoRecente where id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($idPed));
    Banco::desconectar();
  
    //Delete do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM ordem_pedido where id_pedido = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($idPed));
    Banco::desconectar();
    
header ("Location: ../pedidoRecente.php");