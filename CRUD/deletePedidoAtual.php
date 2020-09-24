<?php
session_start();
 
require '../login/init.php';
if (!isLoggedIn())
{
    header('Location: ../index.php');
}

require 'banco.php';

   
  $id = $_REQUEST['id'];
  $idCliente = $_REQUEST['idCliente'];

    //Delete do banco:
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM pedidoAtual where id_individual = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    Banco::desconectar();
    
header ("Location: ../adicionarPedido.php?id=".$idCliente);